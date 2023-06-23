import scipy
import numpy as np
import pandas as pd
import matplotlib.pyplot as plt
import argparse
import yfinance as yf
from pandas_datareader import data as pdr
import openpyxl  
import xlrd
#import xlwt
import xlsxwriter    
from flask import Flask, render_template, request
import bs4
#import PySide2
#import ipykernel
#import IPython
#import ipywidgets
#import ipython_beautifulsoup  
#import jupyter
#import statistics as stat
from scipy.stats import skew, kurtosis

import sys

import Librairie_fonctions

yf.pdr_override()
import datetime

def calculate_mean(symbol):
    data = yf.download(symbol)
    mean = data[data.columns[3]].values.tolist().mean()
    return mean

app = Flask(__name__)

@app.route('/', methods=['GET', 'POST'])
def index():
    if request.method == 'POST':
        symbol = request.form['symbol']
        mean = calculate_mean(symbol)
        return render_template('result.html', symbol=symbol, mean=mean)
    return render_template('form.html')

def calculate_typical_price(data):
    high_prices = data['High'].values.tolist()
    low_prices = data['Low'].values.tolist()
    close_prices = data['Close'].values.tolist()
    typical_prices = [(high + low + close) / 3 for high, low, close in zip(high_prices, low_prices, close_prices)]
    return typical_prices


def calculate_raw_money_flow(data):
    high_prices = data[data.columns[1]].values.tolist()
    low_prices = data[data.columns[2]].values.tolist()
    close_prices = data[data.columns[3]].values.tolist()
    typical_price = calculate_typical_price(data)
    return np.array(typical_price) * np.array(data[data.columns[5]].values.tolist())


def money_flow_index(data, period):
    typical_price = pd.Series(calculate_typical_price(data))
    raw_money_flow = calculate_raw_money_flow(data)
    positive_money_flow = np.where(typical_price > typical_price.shift(1), raw_money_flow, 0)
    negative_money_flow = np.where(typical_price < typical_price.shift(1), raw_money_flow, 0)
    positive_money_flow_sum = pd.Series(positive_money_flow).rolling(window=period).sum()
    negative_money_flow_sum = pd.Series(negative_money_flow).rolling(window=period).sum()
    mfi = 100 - (100 / (1 + (positive_money_flow_sum / negative_money_flow_sum)))
    return mfi

def relative_strength_index(data, period):
    df = pd.DataFrame(data)

    close_series = pd.Series(df[df.columns[3]].astype(float))
    close_diff = close_series.diff()

    gain = np.where(close_diff >= 0, close_diff, 0)
    loss = np.where(close_diff < 0, abs(close_diff), 0)

    average_gain = pd.Series(gain).rolling(window=period).mean()
    average_loss = pd.Series(loss).rolling(window=period).mean()

    relative_strength = average_gain / average_loss
    rsi = 100 - (100 / (1 + relative_strength))

    return rsi.tolist()

def moving_average_convergence_divergence(data, short_period, long_period, signal_period):
    df = pd.DataFrame(data)

    close_series = pd.Series(df[df.columns[3]].astype(float))
    exp_short = close_series.ewm(span=short_period, adjust=False).mean()
    exp_long = close_series.ewm(span=long_period, adjust=False).mean()
    macd_line = exp_short - exp_long
    signal_line = macd_line.ewm(span=signal_period, adjust=False).mean()
    histogram = macd_line - signal_line

    return macd_line.tolist(), signal_line.tolist(), histogram.tolist()

def stats(data, symbol):
    nomfig=symbol + "_histo"
    nombre_observations = int(len(data))
    valeur_minimale = round(min(data), 4)
    valeur_maximale = round(max(data),4)
    moyenne = round(np.mean(data),4)
    variance = round(np.var(data),4)
    asymetrie = round(skew(data),4)
    aplatissement = round(kurtosis(data),4)
    Librairie_fonctions.Histo_Continue(data, 10,nomfig)
    #print(nombre_observations)
    return nombre_observations, valeur_minimale, valeur_maximale, moyenne, variance, asymetrie, aplatissement

if __name__=='__main__':
    # Les données de The Boeing Company (BA) du 1er janvier 2021 à aujourd'hui

    depart=datetime.datetime(2021,1,1)  # 1er janvier 2021
    fin=datetime.datetime.today()  # jour=aujourd'hui
    period = (fin - depart).days  # Période basée sur le temps écoulé en jours

    # Récupérer le symbole depuis les arguments de ligne de commande
    symbol = sys.argv[1]

    data=pdr.get_data_yahoo(symbol, 
                start=depart,
                end=fin, progress = False)

    #money_flow_index(data_BA, 5)
    #relative_strength_index(data_BA,5)

    # Exemple d'utilisation
    data = data['Open'].values.tolist()
    #short_period = 12  
    #long_period = 26 
    #signal_period = 9 

    #macd, signal, histogram = moving_average_convergence_divergence(data, short_period, long_period, signal_period)
    #print("MACD Line:", macd)
    #print("Signal Line:", signal)
    #print("Histogram:", histogram)

    # Tracer l'histogramme
    #plt.plot(histogram, color='red', label='Histogram')
    #plt.axhline(0, color='black', linestyle='--')
    #plt.xlabel('Time')
    #plt.ylabel('Histogram')
    #plt.title('MACD Histogram')
    #plt.legend()
    #plt.show()

    print(stats(data, "BA")[0])
    print(stats(data, "BA")[1])
    print(stats(data, "BA")[2])
    print(stats(data, "BA")[3])
    print(stats(data, "BA")[4])
    print(stats(data, "BA")[5])
    print(stats(data, "BA")[6])
