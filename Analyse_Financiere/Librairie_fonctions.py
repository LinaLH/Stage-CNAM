# Moments

def Moment_r(data,r):
    import functools
    data=[x for x in data] # transformation de données en liste
    fonc_r= lambda x : x**r
    S=functools.reduce( lambda x, y: x+y,map(fonc_r,data))
    return S/(1.0*len(data))

	
#Moments Centrés

def Moment_cr(data,r):
    data=[x for x in data] # transformation de données en liste
    import functools
    m=Moment_r(data,1)
    fonc_r= lambda x : (x-m)**r
    S=functools.reduce(lambda x, y: x+y,map(fonc_r,data))
    return S/(1.0*len(data))

	

# mode(s) pour les données discrètes

def Mode_D(data):
    data=list(data)
    Dic={}
    for x in data:
        Dic[x]=data.count(x)
        
    Valeurs=[t for t in Dic.keys()]
    Effectifs=[t for t in Dic.values()]
    n_max=max(Effectifs)
        
    return [x for x in Valeurs if Dic[x]==n_max]
  

# classe modale pour les données continues

def classse_modale(data,nb_classe):
    data=[x for x in data]
    m0=min(data)
    m1=max(data)
    
    #Extrémités des classes
    Extrem=[m0+(m1-m0)*i/nb_classe  for i in range(nb_classe+1)]
    
    #Effectifs des classes
    NN=[]
    for j in range(nb_classe):
        s=0
        for x in sorted(data):
            if x >= Extrem[j] and x <=Extrem[j+1]:
                s+=1
        NN.append(s)
    
    j_max=[j for j in range(nb_classe) if NN[j]==max(NN)][0]
    
    return Extrem[j_max],Extrem[j_max+1]
  

def Histo_Discrete(data,nom=None):
    
    import numpy
    import matplotlib.pyplot as plt
    plt.rcParams['hatch.color'] = [0.9,0.9,0.9]
    
    # sous fonction pour compter les occurrences
    def comptage(data):
        data=sorted(data)
        Dic_compt={}
        for valeur in data:
            Dic_compt[valeur]=data.count(valeur)
        return Dic_compt

    D=comptage(data)
    
    valeurs=[k for k in D.keys()]
    effectifs=[v for v in D.values()]
    i_mode=numpy.argmax(effectifs)
    ### multi_mode
    indice_mode=[i for i in range(len(effectifs)) if effectifs[i]==effectifs[i_mode]]

    fig = plt.figure(figsize=(10,8))
    ax1 = fig.add_subplot(111)
    # cacher le cadre
    ax1.spines['right'].set_visible(False)
    ax1.spines['top'].set_visible(False)
    ax1.spines['left'].set_visible(False)
    ax1.xaxis.set_ticks_position('bottom')
    ax1.set_yticks([])
    
    ax1.set_xticks(valeurs)  ## positions des extrémités des classes
    ax1.set_xticklabels(valeurs ,fontsize=10, rotation=25)
    ax1.set_xlabel("Valeurs",fontsize=14)
    ax1.set_ylabel("Effectifes",fontsize=14)
    
    for k in range(len(valeurs)):
        if k not in indice_mode:
            plt.bar(valeurs[k], height= effectifs[k],edgecolor="white")
        else:
            plt.bar(valeurs[k], height= effectifs[k],edgecolor="white",
                    color = [0.15,0.15,0.85],hatch="X", lw=1., zorder = 0)
        for i in range(len(valeurs)):
            ax1.text(valeurs[i], effectifs[i], "%d"%(effectifs[i]),fontsize=9,
                     horizontalalignment='center',verticalalignment='bottom',style='italic')
    
    if nom is None:
        plt.show()
    else:
        nom_fig=str(nom)+".png"
        plt.savefig(nom_fig, format="png")
        plt.close()

def Histo_Continue(data,k,nom=None):
    # k=nombre d'intervalles
    
    import numpy
    import matplotlib.pyplot as plt
    plt.rcParams['hatch.color'] = [0.9,0.9,0.9]
    
    data=numpy.array([x for x in data])
    Ext=[min(data)+(max(data)-min(data))*i/(1.0*k) for i in range(k+1)]
    C=[0.5*(Ext[i]+Ext[i+1]) for i in range(k)]

    NN=[] # Effectifs des classes
    for i in range(k):
        NN.append(((Ext[i] <= data) & (data<=Ext[i+1])).sum())
        
    # pour la classe modale
    indice_max=[i for i in range(k) if NN[i]==numpy.max(NN)]
    
    TT=[str("{:.4f}".format(t)) for t in Ext]  ## pour afficher les extrémités des classes
    
    fig = plt.figure(figsize=(10,7))
    ax1 = fig.add_subplot(111)
    # cacher le cadre
    ax1.spines['right'].set_visible(False)
    ax1.spines['top'].set_visible(False)
    ax1.spines['left'].set_visible(False)
    ax1.xaxis.set_ticks_position('bottom')
    ax1.set_yticks([])
    largeur=Ext[1]-Ext[0]  #  largeur des classes
    
    for i in range(k):
        
        if i in indice_max: 
            ax1.bar(C[i], NN[i],largeur,  color = [0.15,0.15,0.80], edgecolor="white", hatch="/", 
                    lw=1., zorder = 0,alpha=0.9)
        else:
            ax1.bar(C[i], NN[i],largeur, align='center', edgecolor="white")
        
        ax1.text(C[i], NN[i], "%d"%(NN[i]),fontsize=9, style='italic', 
                 horizontalalignment='center',verticalalignment='bottom')

    ax1.set_xticks(Ext)  ## positions des extrémités des classes
    ax1.set_xticklabels(TT ,fontsize=10, rotation=45)
    ax1.set_xlim(numpy.min(data)-0.75*largeur, numpy.max(data)+0.75*largeur)
    ax1.set_ylim(0.0, numpy.max(NN)+3.0)
    ax1.set_xlabel("Valeurs",fontsize=13,labelpad=0)
    ax1.set_ylabel("Effectifs",fontsize=14)
    
    if nom is None:
        plt.show()
    else:
        nom_fig=str(nom)+".png"
        plt.savefig(nom_fig, format="png")
        plt.close()

  






def adresse_symbole(symbole,date_D,date_F):

    import datetime
    import time
    import pandas

    add_1="https://query1.finance.yahoo.com/v7/finance/download/"
    add_1=add_1+str(symbole)+"?"

    add_f="&interval=1d&events=history&includeAdjustedClose=true"

    ff=datetime.datetime.today()    
    R="{}-{}-{}".format(ff.year,ff.month,ff.day)

    date_depart='%.0f' %time.mktime(datetime.datetime.strptime(date_D, "%Y-%m-%d").timetuple())
    date_F= '%.0f' %time.mktime(datetime.datetime.strptime(date_F, "%Y-%m-%d").timetuple())
    site="{}period1={}&period2={}{}".format(add_1,date_depart,date_F,add_f)
    return pandas.read_csv(site,parse_dates=["Date"],index_col=["Date"])




def Histo_Discrete64(data):
    import numpy
    import matplotlib.pyplot as plt
    import matplotlib
    # matplotlib.use('Agg')
    plt.switch_backend('agg')
    from base64 import b64encode
    import os
    
    plt.rcParams['hatch.color'] = [0.9,0.9,0.9]
    # sous fonction pour compter les occurrences
    def comptage(data):
        data=sorted(data)
        Dic_compt={}
        for valeur in data:
            Dic_compt[valeur]=data.count(valeur)
        return Dic_compt

    D=comptage(data)
   
    valeurs=[k for k in D.keys()]
    effectifs=[v for v in D.values()]
    i_mode=numpy.argmax(effectifs)
    ### multi_mode
    indice_mode=[i for i in range(len(effectifs)) if effectifs[i]==effectifs[i_mode]]

    fig = plt.figure(figsize=(10,8))
    ax1 = fig.add_subplot(111)

    #ax1 =plt.gca()
    # cacher le cadre
    ax1.spines['right'].set_visible(False)
    ax1.spines['top'].set_visible(False)
    ax1.spines['left'].set_visible(False)
    ax1.xaxis.set_ticks_position('bottom')
    ax1.set_yticks([])
   
    ax1.set_xticks(valeurs)  ## positions des extrémités des classes
    ax1.set_xticklabels(valeurs ,fontsize=10, rotation=25)
    ax1.set_xlabel("Valeurs",fontsize=14)
    ax1.set_ylabel("Effectifes",fontsize=14)
   
    for k in range(len(valeurs)):
        if k not in indice_mode:
            plt.bar(valeurs[k], height= effectifs[k],edgecolor="white",color = numpy.random.rand(3))
        else:
            plt.bar(valeurs[k], height= effectifs[k],edgecolor="white",
                    color = [0.15,0.15,0.85],hatch="X", lw=1., zorder = 0)
        for i in range(len(valeurs)):
            ax1.text(valeurs[i], effectifs[i], "%d"%(effectifs[i]),fontsize=9,
                     horizontalalignment='center',verticalalignment='bottom',style='italic')
   
    # nom figure
    plt.savefig('histo64.png')
    plt.close()
    plot_file = open('histo64.png', 'rb')
    base64_string = b64encode(plot_file.read()).decode()
    plot_file.close()


    img_elem = "{}".format(base64_string)

    os.remove("histo64.png")

    return img_elem


############################################"

#####################################################################
### Histogramme des données Continues en base64 pour flask

def Histo_Continue64(data,k):
    # k=nombre d'intervalles
   
    import numpy
    import matplotlib.pyplot as plt
    import matplotlib
    #matplotlib.use('Agg')
    plt.switch_backend('agg')
    from base64 import b64encode
    import os
   
    plt.rcParams['hatch.color'] = [0.9,0.9,0.9]
   
    data=numpy.array([x for x in data])
    Ext=[min(data)+(max(data)-min(data))*i/(1.0*k) for i in range(k+1)]
    C=[0.5*(Ext[i]+Ext[i+1]) for i in range(k)]

    NN=[] # Effectifs des classes
    for i in range(k):
        NN.append(((Ext[i] <= data) & (data<=Ext[i+1])).sum())
       
    # pour la classe modale
    indice_max=[i for i in range(k) if NN[i]==numpy.max(NN)]
   
    TT=[str("{:.4f}".format(t)) for t in Ext]  ## pour afficher les extrémités des classes
   
    fig = plt.figure(figsize=(10,7))
    ax1 = fig.add_subplot(111)
    # cacher le cadre
    ax1.spines['right'].set_visible(False)
    ax1.spines['top'].set_visible(False)
    ax1.spines['left'].set_visible(False)
    ax1.xaxis.set_ticks_position('bottom')
    ax1.set_yticks([])
    largeur=Ext[1]-Ext[0]  #  largeur des classes
   
    for i in range(k):
       
        if i in indice_max:
            ax1.bar(C[i], NN[i],largeur,  color = [0.15,0.15,0.80], edgecolor="white", hatch="/",
                    lw=1., zorder = 0,alpha=0.9)
        else:
            ax1.bar(C[i], NN[i],largeur, align='center', color = numpy.random.rand(3),edgecolor="white")
       
        ax1.text(C[i], NN[i], "%d"%(NN[i]),fontsize=9, style='italic',
                 horizontalalignment='center',verticalalignment='bottom')

    ax1.set_xticks(Ext)  ## positions des extrémités des classes
    ax1.set_xticklabels(TT ,fontsize=9, rotation=45)
    ax1.set_xlim(numpy.min(data)-0.75*largeur, numpy.max(data)+0.75*largeur)
    ax1.set_ylim(0.0, numpy.max(NN)+3.0)
    ax1.set_xlabel("Valeurs",fontsize=13,labelpad=0)
    ax1.set_ylabel("Effectifs",fontsize=14)

    # nom figure
    plt.savefig('histo64.png')
    plt.close()
    plot_file = open('histo64.png', 'rb')
    base64_string = b64encode(plot_file.read()).decode()
    plot_file.close()


    img_elem = "{}".format(base64_string)

    os.remove("histo64.png")

    return img_elem

    
    
