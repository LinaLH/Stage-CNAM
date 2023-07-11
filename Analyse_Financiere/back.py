import scipy
import numpy as np
import pandas as pd
import matplotlib.pyplot as plt
import argparse
import yfinance as yf
from pandas_datareader import data as pdr
#import openpyxl  
#import xlrd
#import xlwt
#import xlsxwriter    
#lask import Flask, render_template, request
import bs4
#import PySide2
#import ipykernel
#import IPython
#import ipywidgets
#import ipython_beautifulsoup  
#import jupyter
import statistics as stat
from scipy.stats import skew, kurtosis

import sys

import Librairie_fonctions

yf.pdr_override()
import datetime
import time


def nom_societe(v) :
    Dictionnaire_action = {
    "The Boeing Company" : "BA" ,
    "Airbus SE" : "AIR.PA" ,
    "Lockheed Martin Corporation" : "LMT" ,
    " Honeywell International Inc." : "HON" ,
    "General Dynamics Corporation" : "GD" ,
    "BAE Systems plc" : "BAESY" ,
    "Northrop Grumman Corporation" : "NOC" ,
    "Bombardier Inc." : "BDRAF",
    "Toyota Motor Corporation" : "TM" ,
    "Volkswagen AG" : "VLKAF",
    "Maruti Suzuki India Limited" : "MARUTI.NS" ,
    "AB Volvo (publ) " : "VOLVF" ,
    "Peugeot Invest Société anonyme" : "FFP.F" ,
    "Mercedes-Benz Group AG" : "MBG.DE" ,
    "General Motors Company" : "GM" ,
    "Ford Motor Company " : "F" ,
    "Honda Motor Co., Ltd." : "HMC" , 
    "Bayerische Motoren Werke Aktiengesellschaft" : "BMW.DE" ,
    "Exxon Mobil Corporation" : "XOM" ,
    "Chevron Corporation" : "CVX" ,
    "Petróleo Brasileiro S.A. - Petrobras" : "PTR" ,
    "BP" : "BP" ,
    "ENI" : "E" ,
    "Shell" : "SHEL" ,
    "TotalEnergies" : "TTE" ,
    "Equinor ASA" : "EQNR" ,
    "Coterra Energy Inc." : "CTRA" ,
    "Electricit&eacute; de France S.A." : "ENGIY" ,
    "Bouygues SA" : "EN.PA" ,
    "Vinci SA" :  "DG.PA" ,
    "Herige" : "ALHRG.PA" , 
    "Hoffmann Green Cement Technologies Societe anonyme": "0VW.F" ,
    "Installux S.A." : "ALLUX.PA" ,
    "Neolife SA" : "ALNLF.PA " ,
    "Hyundai Bng Steel Co., Ltd." : "004560.KS" ,
    "ABB Ltd" : "ABB" ,
    "Sinomach General Machinery Science & Technology Co.,Ltd." : "600444.SS" ,
    "Mitsubishi Motors Corporation" : "MMTOF" ,
    "Alstom SA" : "ALO.PA" ,
    "Schneider Electric S.E." : "SU.PA" ,
    "Vinci SA" :  "DG.PA" ,
    "Bouygues SA" : "BOUYF" ,
    "Holcim Ltd" : "HCMLY" ,
    "BASF SE" : "BASFY" ,
    "Dow Inc." : "DOW" ,
    "Dupont Fabros Technology, Inc." : "DFT-PC" ,
    "Novartis AG" : "NVS" ,
    "Pfizer Inc." : "PFE" ,
    "Sanofi" : "SNY" ,
    "Merck & Co., Inc." : "MRK" ,
    "Johnson & Johnson" : "JNJ" ,
    "Bayer Aktiengesellschaft" : "BAYRY" ,
    "Eurofins Scientific SE" : "ERF.PA" ,
    "Virbac SA" : "VIRP.PA" ,
    "Guerbet SA" : "GBT.PA" ,
    "DBV Technologies S.A." : "DBV.PA" ,
    "Sartorius Stedim Biotech S.A." : "DIM.PA" ,
    "Vetoquinol SA" : "VETO.PA" ,
    "LNA Santé SA" : "LNA.PA" ,
    "Bastide Le Confort Médical SA" : "BLC.PA" ,
    "Celyad Oncology SA" : "CYAD.BR" ,
    "Nanobiotix S.A." : "NANO.PA" ,
    "AB Science S.A." : "AB.PA" ,
    "Ramsay Générale de Santé SA" : "GDS.PA" ,
    "Innate Pharma S.A." : "IPH.PA" ,
    "Amazon.com, Inc." : "AMZN" ,
    "eBay Inc." : "EBAY" ,
    "Unilever PLC" : "UL" ,
    "The Procter & Gamble Company" : "PG" ,
    "The Estée Lauder Companies Inc." : "EL" , 
    "L'Oreal SA" : "OR.PA" ,
    "Danone S.A." : "DANOY" ,
    "Tesco PLC" : "TSCDY" ,
    "Hermès International Société en commandite par actions" : "RMS.PA" ,
    "Christian Dior SE" : "CDI.PA" ,
    "LVMH Moë t Hennessy - Louis Vuitton, Société Européenne" : "MC.PA" ,
    "SEB SA" : "SK.PA" ,
    "Compagnie Générale des établissements Michelin Socété en commandite par actions" : "ML.PA" ,
    "Pernod Ricard SA" : "RI.PA" ,
    "Laurent-Perrier S.A." :  "LPE.PA" ,
    "Vilmorin & Cie SA" : "RIN.PA" ,
    "Orange S.A." : "ORA.PA" ,
    "Verizon Communications Inc." : "VZ" ,
    "AT&T Inc." : "T" ,
    "Vodafone Group Public Limited Company" : "VOD" ,
    "Deutsche Telekom AG" : "DTEGY" ,
    "Nippon Telegraph and Telephone Corporation" : "NPPXF" ,
    "Alphabet Inc." : "GOOGL" ,
    "Alibaba Group Holding Limited" : "BABA" ,
    "Baidu, Inc." : "BIDU" ,
    "SAP SE" : "SAP" ,
    "Salesforce, Inc." : "CRM" ,
    "VMware, Inc." : "VMW" ,
    "Adobe Inc." : "ADBE" ,
    "Intuit Inc." : "INTU" ,
    "LinkedIn Corporation" : "LNKD" ,
    "Apple Inc." : "AAPL" ,
    "Microsoft Corporation" : "MSFT" ,
    "Oracle Corporation" : "ORCL" ,
    "International Business Machines Corporation" : "IBM" ,
    "Intel Corporation" : "INTC" ,
    "Taiwan Semiconductor Manufacturing Company Limited" : "TSM" ,
    "QUALCOMM Incorporated" : "QCOM" ,
    "HP Inc." : "HPQ" ,
    "Texas Instruments Incorporated" : "TXN" ,
    "JD.com, Inc." : "JD" ,
    "Nokia Oyj" : "NOK" ,
    "Micron Technology, Inc." : "MU" ,
    "Panasonic Holdings Corporation" : "PCRFY" ,
    "Nintendo Co., Ltd." : "NTDOY" ,
    "Toshiba Corporation" : "TOSYY" ,
    "Jacquet Metals SA" : "JCQ.PA" ,
    "Plastiques du Val de Loire" : "PVL.PA" ,
    "Air Liquide S.A." : "AI.PA" 
    }
    
    for k in Dictionnaire_action.keys() :
        if Dictionnaire_action[k] == v :
            return k
        else :
            continue

#plt.ioff()  # Désactive le mode interactif de matplotlib

def transformation(symbol,depart,fin):
##        depart=datetime.datetime(2021,1,1)  # 1er janvier 2021
##        depart=depart.strftime('%Y-%m-%d')
##        fin=datetime.datetime.today()  # jour=aujourd'hui
##        fin=fin.strftime('%Y-%m-%d')
        
        #data = pdr.get_data_yahoo(symbol, start=depart, end=fin, progress=False)
        data = Librairie_fonctions.adresse_symbole(symbol, depart,fin) 
        #print(data.columns)
        #print(data)

        L2=datetime.datetime.strptime(fin, '%Y-%m-%d').date()
        L1=datetime.datetime.strptime(depart, '%Y-%m-%d').date()

        #period = (fin - depart).days  # Période basée sur le temps écoulé en jours

        period=(L2-L1).days
        c = len(data.columns)
        high_prices = data['High']#.values.tolist()
        low_prices = data['Low']#.values.tolist()
        close_prices = data['Close']#.values.tolist()
        data.insert(c, "typical_prices", (high_prices + low_prices + close_prices) / 3, True)
        data.insert(c+1, "raw_money_flow", data["typical_prices"].values * data[data.columns[5]].values, True)
        #data['typical_prices'] = (data['High']+ data['Low'] + data['Close'])/3
        #data["raw_money_flow"] = data["typical_price"].values * data[data.columns[5]].values
        return data


def affiche_graphique(symbol,depart,fin, period, short_period, long_period, signal_period):

    import matplotlib
    #matplotlib.use('Agg')
    plt.switch_backend('agg')
    from base64 import b64encode
    import os
    
    def money_flow_index(symbol,depart,fin, period):
        data1 = transformation(symbol,depart,fin)
        flow_positive = []
        flow_negative = []
        typical_price = data1['typical_prices'].values.tolist()
        raw_money_flow = data1['raw_money_flow'].values.tolist()

        for i in range(1, len(data1)):
            if i < period:
                flow_positive.append(0)
                flow_negative.append(0)
            else:
                if typical_price[i] > typical_price[i-1]:
                    flow_positive.append(raw_money_flow[i-1])
                    flow_negative.append(0)
                elif typical_price[i] < typical_price[i-1]:
                    flow_positive.append(0)
                    flow_negative.append(raw_money_flow[i-1])
                else:
                    flow_positive.append(0)
                    flow_negative.append(0)

        # Calculer le MFI sur la période spécifiée
        #print([i for i in range(period-1, len(data1))])
        mfi = []
        for i in range(period-1, len(data1)):
            #print('len=',len(flow_positive[i-period+1:i+1]))
            pos_flow_sum = sum(flow_positive[i-period+1:i+1])
            neg_flow_sum = sum(flow_negative[i-period+1:i+1])
            if neg_flow_sum != 0:
                ratio = pos_flow_sum / neg_flow_sum
                mfi.append(100 - (100 / (1 + ratio)))
            else:
                mfi.append(100)
        #print(mfi)
        #print("Fin")
        return mfi
    
    
    
    def relative_strength_index(symbol,depart,fin, period):
        df = transformation(symbol,depart,fin)

        close_series = pd.Series(df[df.columns[3]].astype(float))
        close_diff = close_series.diff()

        gain = np.where(close_diff >= 0, close_diff, 0)
        loss = np.where(close_diff < 0, abs(close_diff), 0)

        average_gain = pd.Series(gain).rolling(window=period).mean()
        average_loss = pd.Series(loss).rolling(window=period).mean()

        relative_strength = average_gain / average_loss
        rsi = 100 - (100 / (1 + relative_strength))

        return rsi
    
    def moving_average_convergence_divergence(symbol,depart,fin ,short_period, long_period, signal_period):
        df = transformation(symbol,depart,fin)
        #print(df.index)
        indice_choix = [i+1 for i in range(len(df.index[1:])) if i%25 == 0]
        #print(indice_choix)

        close_series = pd.Series(df[df.columns[3]].astype(float))
        exp_short = close_series.ewm(span=short_period, adjust=False).mean()
        exp_long = close_series.ewm(span=long_period, adjust=False).mean()
        macd_line = exp_short - exp_long
        signal_line = macd_line.ewm(span=signal_period, adjust=False).mean()
        histogram = macd_line - signal_line
        #print(histogram)

        macd_line = macd_line.tolist()
        signal_line = signal_line.tolist()
        histogram = histogram.tolist()

        return macd_line, signal_line, histogram
    
    
    
    df = transformation(symbol,depart,fin)
    indice_choix = [i+1 for i in range(len(df.index[1:])) if i%30 == 0]
    #print(indice_choix)
    #print(transformation(symbol))
    #print(money_flow_index(symbol, period))
    #print(data)
    # Crée une figure avec 3 sous-graphiques disposés verticalement
    fig, axes = plt.subplots(nrows=3, ncols=1, figsize=(10, 15))
    plt.subplots_adjust(left=0.1,
                    bottom=0.5,
                    right=0.9,
                    top=0.9,
                    wspace=0.9,
                    hspace=0.9)
    #print(data)
    # Premier graphique - Money Flow Index
    #print(money_flow_index(data, period).values.tolist())
    #print(money_flow_index(symbol, period))
    #date_range = pd.date_range(depart, fin)
    axes[0].plot(money_flow_index(symbol,depart,fin, period)[2:], color='blue', label='MFI Line') #[1:] pour ne pas commencer à 0 à cause du .shift(1)
    #money_flow_index(data, period).plot(color='blue', label='MFI Line')
    axes[0].set_xlabel('Temps (en jours)')
    axes[0].set_ylabel('MFI')
    axes[0].set_title('Indice de Flux Monétaire (MFI)', fontsize=17)
    axes[0].legend()
    
    # Deuxième graphique - Relative Strength Index
    axes[1].plot(relative_strength_index(symbol,depart,fin, period), color='blue', label='RSI Line')
    axes[1].set_xlabel('Temps (en jours)')
    axes[1].set_ylabel('RSI')
    axes[1].set_title('Indice de Force Relative (RSI)', fontsize=17)
    axes[1].legend()

    # Troisième graphique - Moving Average Convergence Divergence
    macd_line, signal_line, histogram = moving_average_convergence_divergence(symbol,depart,fin, short_period, long_period, signal_period)
    axes[2].plot(histogram, color='red', label='Histogram')
    axes[2].axhline(0, color='black', linestyle='--')
    axes[2].bar(range(len(histogram)), histogram, color='red', alpha=0.5)
    axes[2].set_xlabel('Temps (en jours)')
    axes[2].set_ylabel('MACD')
    axes[2].set_title('Convergence/Divergence de la Moyenne Mobile (MACD)', fontsize=17)
    axes[2].legend()
    
    for i in range(len(axes)):
        axes[i].set_xticks(indice_choix)
        axes[i].set_xticklabels([df.index[i].strftime("%d-%m-%Y") for i in indice_choix], rotation=45, fontsize=10)


    # Formater les dates sur l'axe des abscisses
    #date_formatter = DateFormatter('%Y-%m-%d')
    #axes[0].xaxis.set_major_formatter(date_formatter)
    #axes[1].xaxis.set_major_formatter(date_formatter)
    #axes[2].xaxis.set_major_formatter(date_formatter)

    # Ajuste l'espacement entre les sous-graphiques
    plt.tight_layout()
    #nom_fig = str(symbol) + "_courbes.png"
    ##affiche_graphique(symbol, 14, short_period, long_period, signal_period)  # Utilisez le nom_fig pour spécifier le nom du fichier de sortie
    #plt.savefig(nom_fig, format="png")  # Enregistre la figure dans le fichier spécifié par nom_fig
    #plt.close()  # Ferme la figure

    plt.savefig('courbes64.png')
    plt.close()
    plot_file = open('courbes64.png', 'rb')
    base64_string = b64encode(plot_file.read()).decode()
    plot_file.close()

    img_elem = "{}".format(base64_string)

    os.remove("courbes64.png")

    return img_elem

def stats(symbol,depart,fin, period, short_period, long_period, signal_period):
    data = transformation(symbol,depart,fin)
    
    data = data["Adj Close"].dropna().values.tolist()

    #print(data)
    nomfig = symbol + "_histo"
    nombre_observations = int(len(data))
    valeur_minimale = round(np.min(data), 4)
    valeur_maximale = round(np.max(data), 4)
    moyenne = round(np.mean(data), 4)
    variance = round(np.var(data), 4)
    asymetrie = round(skew(np.array(data)), 4)  # Convert list to NumPy array and calculate skewness
    aplatissement = round(kurtosis(np.array(data)), 4)  # Convert list to NumPy array and calculate kurtosis
    #Librairie_fonctions.Histo_Continue(data, 10, nomfig)
    histo_html = Librairie_fonctions.Histo_Continue64(data, 12)
    courbes_html = affiche_graphique(symbol,depart,fin, period, short_period, long_period, signal_period)
    #print(histo_html)
    societe_html = nom_societe(symbol)
    #print(societe_html)
    return nombre_observations, valeur_minimale, valeur_maximale, moyenne, variance, asymetrie, aplatissement, histo_html, courbes_html, societe_html

#plt.ion()

if __name__=='__main__':
     # Récupérer le symbole depuis les arguments de ligne de commande
    symbol = sys.argv[1]
    # Les données de The Boeing Company (BA) du 1er janvier 2021 à aujourd'hui
    #depart = sys.argv[2]
    #fin = sys.argv[3]
    short_period = int(sys.argv[2])
    long_period = int(sys.argv[3])
    signal_period = int(sys.argv[4])
    depart= sys.argv[5]
    fin= sys.argv[6]
    #fin=datetime.datetime(2011,1,20)
    #short_period = 12
    #long_period = 26
    #depart = datetime.datetime(2021,1,1)
    #fin = datetime.datetime.today()
    #print(depart)
    #print(fin)
    #signal_period = 9
    #period = (depart-fin).days
    #symbol = "BA"

   
    #print(transformation(symbol,depart,fin))
    #data = pdr.get_data_yahoo(symbol, start=depart, end=fin, progress=False)
    #print(data)
   
    #print(data)
    stats_html = stats(symbol,depart,fin, 14, short_period, long_period, signal_period)
    print(stats_html[0])
    print(stats_html[1])
    print(stats_html[2])
    print(stats_html[3])
    print(stats_html[4])
    print(stats_html[5])
    print(stats_html[6])
    print(stats_html[7])
    print(stats_html[8])
    print(stats_html[9])
    #print(stats(symbol,depart,fin)[7])

    #affiche_graphique(symbol,depart,fin, 14, short_period, long_period, signal_period)

    


