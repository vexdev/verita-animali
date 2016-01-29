/*********************************************************************************/
//! restituisce l'handle all'elemento DOM indicato
/*! @param	nome	identificativo dell'oggetto
	@return	puntatore all'oggetto specificato, NULL altrimenti */
function getElement(nome) {
	//NN6 ed Opera
	if (document.getElementById) return document.getElementById(nome);
	// IE
	else if (document.all) return document.all[nome];
	// NN4
	else if (document.layers) return document.layers[nome];
	// invalid browser
	else return null;
};


/*********************************************************************************/
//! mostra un pop-up standard
/*! @param url		indirizzo della pagina
	@param target	destinazione
	@param width	larghezza
	@param height	altezza
	@param top		posizione X
	@param left		posizione Y */
function showPopup(url, target, width, height, top, left) {
  window.open(url, target, "width=" + width + ",height=" + height + ",top=" + top + ",left=" + left + ",toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=1,resizable=1");
};


/*********************************************************************************/
//! verifica la validità dell'indirizzo mail immesso
/** @param o	stringa sulla quale applicare il controllo
	@param n	[OPZIONALE] 0 specifica nessun alert, 1 mostra un avviso
	@return		TRUE in caso di controllo passato, FALSE altrimenti */
function checkMail(o) {
	if (checkMail.arguments.length==1) return checkMail(o,1);
	
	if (o!='')
	{
		var errore = false;
		var x = o.toLowerCase();
		var i;
		var espressione = /^[^@]{1,64}@[^@]{1,255}$/;
		// First, we check that there's one @ symbol, and that the lengths are right
		if (espressione.test(x))
		{
			// Split it into sections to make life easier
			var email_array = x.split('@');
			var local_array = email_array[0].split(".");
			// check user part
			espressione = /^([a-z0-9_~-]*[a-z0-9]+)$/;
			for (i = 0; i < local_array.length; i++)
			{
				if (!espressione.test(local_array[i]))
				{
					errore = true;
					break;
				}
			}

			// check domain part
			espressione = /^\[?[0-9\.]+\]?$/;
			if (!espressione.test(email_array[1]))
			{	// Check if domain is IP. If not, it should be valid domain name
				var domain_array = email_array[1].split(".");
				if (domain_array.length >= 2)
				{
					espressione = /^(([a-z0-9][a-z0-9-]{0,61}[a-z0-9])|([a-z0-9]+))$/;
					for (i = 0; i < domain_array.length; i++)
					{
						if (!espressione.test(domain_array[i]))
						{
							errore = true;
							break;
						}
					}
				}
				else errore = true;
			}
		}
		else errore = true;
		
		
		if (errore)
		{
			if (checkMail.arguments[1]) alert('Indirizzo e-mail non valido...');
			return false;
		}
	}
	
	return true;
};


/*********************************************************************************/
/*********************************************************************************/
/*********************************************************************************/
/********************************  AJAX  *****************************************/
/*********************************************************************************/
/*********************************************************************************/
/*********************************************************************************/

//! assegna l'oggetto XMLHttpRequest compatibile con i browsers
/*! @return	ritorna il puntatore all'oggetto AJAX */
function getXMLHttpRequest()
{
	// Mozilla, FireFox
	try { return new XMLHttpRequest(); } catch (e) {}
	// IE
	try{ return new ActiveXObject("MSXML3.XMLHTTP"); } catch(e){}
	try{ return new ActiveXObject("MSXML2.XMLHTTP.3.0"); }catch(e){}
	try{ return new ActiveXObject("Msxml2.XMLHTTP"); }catch(e){}
	try{ return new ActiveXObject("Microsoft.XMLHTTP"); }catch(e){}
	
	return false;
};


/*********************************************************************************/
/*********************************************************************************/
/*********************************************************************************/
/*************************  controllo stringhe  **********************************/
/*********************************************************************************/
/*********************************************************************************/
/*********************************************************************************/

//! esegue il trim della stringa
/*! @param	stringToTrim	stringa di partenza
	@return	stringa di ritorno senza spazi iniziali e finali */
function trim(stringToTrim) {
	var t = ""+stringToTrim; // conversione in stringa
	return t.replace(/^\s+|\s+$/g,"");
};


//! esegue il ltrim della stringa
/*! @param	stringToTrim	stringa di partenza
	@return	stringa di ritorno senza spazi iniziali */
function ltrim(stringToTrim) {
	var t = ""+stringToTrim; // conversione in stringa
	return t.replace(/^\s+/,"");
};


//! esegue il rtrim della stringa
/*! @param	stringToTrim	stringa di partenza
	@return	stringa di ritorno senza spazi finali */
function rtrim(stringToTrim) {
	var t = ""+stringToTrim; // conversione in stringa
	return t.replace(/\s+$/,"");
};


/*********************************************************************************/
/*********************************************************************************/
/*********************************************************************************/
/**********************  controllo valori numerici  ******************************/
/*********************************************************************************/
/*********************************************************************************/
/*********************************************************************************/

//! accetta l'inserimento esclusivamente di numeri
/** la funzione va invovata sull'evento onKeyDown="return onlyNumber(event)" */
function onlyNumber(e)
{
	var evt = e || window.event;
	var charCode = (evt.which) ? evt.which : evt.keyCode;
	
	if(	(charCode == 13 || charCode == 9) ||
	   	(charCode == 46 || charCode == 8) ||
		(charCode >= 37 && charCode <= 40) ||
		(charCode == 189 || charCode == 109) ||
		(charCode >= 96 && charCode <= 105) ||
		(charCode >= 48 && charCode <= 57) )
	return true;
	else return false;
};


//! verifica che il valore sia un numero
/** @param val	elemento da valutare
	@return		TRUE nel caso sia un numero, FALSE altrimenti */
function is_numeric(val) { return (typeof(val)=="number"); };
