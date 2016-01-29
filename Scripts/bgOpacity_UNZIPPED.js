/*******************************************************************************
BACKGROUND OPACITY
********************************************************************************
Questo script mostra un background nero che sovrasta lo schermo ed il suo
contenuto. E' usato per accentuare l'attenzione dell'utente su messaggi,
opzioni, ecc...
Per essere impiegato occorre includere nel BODY della pagina lo script.

*******************************************************************************/

var bgOpacity = {
	
	// ---------------- PARAMETRI INTERNI ----------------
	// larghezza predefinita delle scrollbar di sistema (pixel)
	scrollbarwidth: 16,
	// specifica se nascondere le scrollbar mentre si mostra il background (compatibile sono con IE7 e similari)
	nascondoscrollbar: false,
	// riferimento al BODY compatibile con i vari doctypes
	standardbody: null,
	// riferimento al DIV del background
	hDIV: null,
	
	
	// ----------------- FUNZIONI INTERNE ----------------
	//! crea il DIV che gestirà il background opaco
	create: function()
	{
		document.write('<div id="bgOpacity" style="position:absolute;background:#000 url(http://www.clubcasa.it/grafica/blackdot.gif);right:0;width:10px;top:0;z-index:5;visibility:hidden;-moz-opacity:0.8;filter:progid:DXImageTransform.Microsoft.alpha(opacity=80);opacity:0.8;"></div>');
		this.hDIV=document.getElementById("bgOpacity");
		this.standardbody = (document.compatMode=="CSS1Compat") ? document.documentElement : document.body;
	},
	
	
	
	//! mostra il background
	show: function()
	{		
		if (this.nascondoscrollbar) this.hidescrollbar();
		
		var ie=document.all && !window.opera;
		var dom=document.getElementById;
		var scroll_top=(ie)? this.standardbody.scrollTop : window.pageYOffset;
		var scroll_left=(ie)? this.standardbody.scrollLeft : window.pageXOffset;
		var docwidth=(ie)? this.standardbody.clientWidth : window.innerWidth-this.scrollbarwidth;
		var docheight=(ie)? this.standardbody.clientHeight: window.innerHeight;
		var docheightcomplete=(this.standardbody.offsetHeight>this.standardbody.scrollHeight)? this.standardbody.offsetHeight : this.standardbody.scrollHeight;		
		this.hDIV.style.width=docwidth+"px"; //set up veil over page
		this.hDIV.style.height=docheightcomplete+"px"; //set up veil over page
		this.hDIV.style.left=0; //Position veil over page
		this.hDIV.style.top=0; //Position veil over page
		this.hDIV.style.visibility="visible"; //Show veil over page
	},
	
	
	
	//! chiude il DIV di background
	/** viene disattivato il DIV di sfondo.
		Contestualmente vengono riattivate le scrollbar della pagina
		precedentemente disattivate.
	*/
	hide: function()
	{
		if (this.hDIV!=null) this.hDIV.style.visibility='hidden';
		// riattivo le scrollbar
		if (this.nascondoscrollbar && window.XMLHttpRequest) this.standardbody.style.overflow="auto";
	},



	//! restituisce la larghezza effettiva delle scrollbar per la pagina corrente
	/** lo script ricava la larghezza delle scrollbar attraverso il confronto delle
		dimensioni disponibili dell'area interna del browser dopo aver sottratto la
		larghezza di un DIV dalle dimensioni da noi fissate e note.
		Ad esempio posso inserire nel BODY un DIV chiamato TEST che contiene una
		immagine di 10px; confrontando la larghezza in px disponibile con il DIV
		TEST siamo in grado di risalire esattamente alla larghezza delle scrollbar.
		@see http://www.howtocreate.co.uk/emails/BrynDyment.html
	*/
	getscrollbarwidth: function()
	{
		if(this.hDIV==null) return this.scrollbarwidth;
		var w = window.innerWidth-(this.hDIV.offsetLeft+this.hDIV.offsetWidth);
		this.scrollbarwidth = (typeof w=="number") ? w : this.scrollbarwidth;
	},
	
	
	
	//! disattiva le scrollbar per la pagina
	hidescrollbar: function()
	{
		if (window.XMLHttpRequest) // if modern browsers- IE7, Firefox, Safari, Opera 8+ etc
			this.standardbody.style.overflow="hidden";
		else // if IE6 and below, just scroll to top of page to ensure interstitial is in focus
			window.scrollTo(0,0);
	},
	
	
	
	// assegna l'esecuzione di una funzione ad un event handler (ie: onunload)
	dotask: function(target, functionref, tasktype)
	{
		var tasktype=(window.addEventListener)? tasktype : "on"+tasktype;
		if (target.addEventListener) target.addEventListener(tasktype, functionref, false);
		else if (target.attachEvent) target.attachEvent(tasktype, functionref);
	},
	
	
	
	// inizializza la struttura e le variabili
	initialize: function()
	{
		this.create();
		this.dotask(window, function(){bgOpacity.getscrollbarwidth();}, "load");
		this.dotask(window, function(){if (document.getElementById("bgOpacity").style.visibility=="visible") bgOpacity.show();}, "resize");
	}
	
};


// lancio l'inizializzazione dell'oggetto background
bgOpacity.initialize();