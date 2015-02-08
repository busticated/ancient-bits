<%
'******************************
'SRK ASP template 
'******************************

Dim sPage, sTitle, sImgURL, sLinks, sContent

const OTARIMX70 = "otarimx70"
const GADGETLABS824 = "gadgetlabs824"
const MACKIE24X8 = "mackie24x8"
const NS10 = "ns10"
const ROYER121 = "royer121"
const COLES4038 = "coles4038"
const NEUMANNKM184 = "neumannkm184"
const SURESM57 = "suresm57"
const SUREBETA52 = "surebeta52"
const AKGD112 = "akgd112"
const AKGC4000B = "akgc4000b"
const EARTHWRKSTC30K = "earthwrkstc30k"
const ALESISMICROVERB1 = "microverb1"
const ALESISMICROVERB2 = "microverb2"
const FMRRNC1773 = "fmrrnc1773"
const AMPEX601 = "ampex601"
const BIPORT2X4S = "biport2x4s"
const ROLANDRE201 = "rolandre201"
const MOOGMG1 = "moogmg1"
const ARPSOLUS = "arpsolus"
const ROLANDSH1000 = "rolandsh1000"
const KORG700S = "korg700s"
const KORG700 = "korg700"
const ACETONETOP1 = "acetonetop1"
const ACETONERHYTHMACE = "acetonerhythmace"
const FARFISAFAST4 = "farfisafast4"
const FARFISAVIP233 = "farfisavip233"
const HOHNERPIANETT = "hohnerpianett"
const RHODESSTAGEMARK1 = "rhodesstagemark1"
const ROLANDMC303 = "rolandmc303"
const CASIOSK1 = "casiosk1"
const FENDER65TWINREVERB = "fender65twinreverb"
const FENDER63VIBROVERB = "fender63vibroverb"
const TRAYNORYGM3 = "traynorygm3"
const SILVERTONE1482 = "silvertone1482"
const HARMONYLAPSTEEL = "harmonylapsteel"
const HOHNERMELODICA = "hohnermelodica"

sPage = Request("Page")

Select Case sPage

	Case OTARIMX70
		sTitle = "Dented Gear - Otari MX 70 16 Track"
		sImgURL = "http://www.skidmore.edu/academics/music/att/16tkbig.jpg"
		sContent = "<!-- <DIV STYLE='position: absolute; left:10px; top:330px;'><font face='Verdana' size='1'>front&nbsp;-&nbsp;<A HREF='albumart.asp?page=1' TARGET='_top'>back</A></DIV> -->" 
	
	Case GADGETLABS824
		sTitle = "Dented Gear - GadgetLabs Wave824 24-bit 8 channel I/O"
		sImgURL = "http://www.harmony-central.com/Newp/1999/Wave-824.jpg"
		sContent = "<!-- <DIV STYLE='position: absolute; left:10px; top:330px;'><font face='Verdana' size='1'><A HREF='albumart.asp?page=0' TARGET='_top'>front</A>&nbsp;-&nbsp;back</DIV> --> -->" 
	
	Case MACKIE24X8
		sTitle = "Dented Gear - Mackie 24 X 8 analog mixing board"
		sImgURL = "http://www.mackie.com/Products/8Bus/images/8Bus248.JPG"
		sContent = "<!-- <DIV STYLE='position: absolute; left:10px; top:330px;'><font face='Verdana' size='1'>front&nbsp;-&nbsp;<A HREF='albumart.asp?page=3' TARGET='_top'>back</A></DIV> -->" 
	
	Case NS10
		sTitle = "Dented Gear - Yamaha NS 10 Monitor Speakers"
		sImgURL = "http://coffeysound.com/store/media/YAMAHA_MS10LG.jpg"
		sContent = "<!-- <DIV STYLE='position: absolute; left:10px; top:330px;'><font face='Verdana' size='1'><A HREF='albumart.asp?page=2' TARGET='_top'>front</A>&nbsp;-&nbsp;back</DIV> -->" 
	
	Case ROYER121
		sTitle = "Dented Gear - Royer 121 Ribbon Microphone"
		sImgURL = "http://www.royerlabs.com/photos/r_121.jpg"
		sContent = "<!-- <DIV STYLE='position: absolute; left:10px; top:330px;'><font face='Verdana' size='1'>front&nbsp;-&nbsp;<A HREF='albumart.asp?page=5' TARGET='_top'>back</A></DIV> -->" 
	
	Case COLES4038
		sTitle = "Dented Gear - Coles 4038 Ribbon Microphone"
		sImgURL = "http://www.wesdooley.com/prods/03.jpg"
		sContent = "<!-- <DIV STYLE='position: absolute; left:10px; top:330px;'><font face='Verdana' size='1'><A HREF='albumart.asp?page=4' TARGET='_top'>front</A>&nbsp;-&nbsp;back</DIV> -->" 
	
	Case NEUMANNKM184
		sTitle = "Dented Gear - Neumann KM 184 Cardioid Condenser Microphone"
		sImgURL = "http://www.neumann.com/infopool/mics/en/gifs/s180_1.gif"
		sContent = "<!-- <DIV STYLE='position: absolute; left:10px; top:330px;'><font face='Verdana' size='1'>front&nbsp;-&nbsp;<A HREF='albumart.asp?page=7' TARGET='_top'>back</A></DIV> -->" 
	
	Case SURESM57
		sTitle = "Dented Gear - Sure SM 57 Cardioid Dynamic Microphone"
		sImgURL = "http://www.shure.com/photos/sm57_new.jpg"
		sContent = "<!-- <DIV STYLE='position: absolute; left:10px; top:330px;'><font face='Verdana' size='1'><A HREF='albumart.asp?page=6' TARGET='_top'>front</A>&nbsp;-&nbsp;back</DIV> -->" 
	
	Case SUREBETA52
		sTitle = "Dented Gear - Sure BETA 52 Cardioid Dynamic Microphone"
		sImgURL = "http://www.shure.com/photos/bigones/beta52-big.jpg"
		sContent = "<!-- <DIV STYLE='position: absolute; left:10px; top:330px;'><font face='Verdana' size='1'>front&nbsp;-&nbsp;<A HREF='albumart.asp?page=9' TARGET='_top'>back</A></DIV> -->" 
	
	Case AKGD112
		sTitle = "Dented Gear - AKG D 112 Cardioid Dynamic Microphone"
		sImgURL = "http://www.akg-acoustics.com/english/microphones/Bilder/d112.gif"
		sContent = "<!-- <DIV STYLE='position: absolute; left:10px; top:330px;'><font face='Verdana' size='1'><A HREF='albumart.asp?page=8' TARGET='_top'>front</A>&nbsp;-&nbsp;back</DIV> -->" 
	
	Case AKGC4000B
		sTitle = "Dented Gear - AKG C 4000b Multi-Pattern Condenser Microphone"
		sImgURL = "http://www.akg-acoustics.com/english/microphones/Bilder/c4000.gif"
		sContent = "<!-- <DIV STYLE='position: absolute; left:10px; top:330px;'><font face='Verdana' size='1'><A HREF='albumart.asp?page=8' TARGET='_top'>front</A>&nbsp;-&nbsp;back</DIV> -->" 
	
	Case EARTHWRKSTC30K
		sTitle = "Dented Gear - Earthworks TC30K Omni-Directional Condenser Microphone"
		sImgURL = "http://www.earthwks.com/f_mic/tc30_in_box_lg.jpg"
		sContent = "<!-- <DIV STYLE='position: absolute; left:10px; top:330px;'><font face='Verdana' size='1'><A HREF='albumart.asp?page=8' TARGET='_top'>front</A>&nbsp;-&nbsp;back</DIV> -->" 
	
	Case ALESISMICROVERB1
		sTitle = "Dented Gear - Alesis MicroVerb 1"
		sImgURL = "NEEDAPIC"
		sContent = "<!-- <DIV STYLE='position: absolute; left:10px; top:330px;'><font face='Verdana' size='1'><A HREF='albumart.asp?page=8' TARGET='_top'>front</A>&nbsp;-&nbsp;back</DIV> -->" 
	
	Case ALESISMICROVERB2
		sTitle = "Dented Gear - Alesis MicroVerb 2"
		sImgURL = "NEEDAPIC"
		sContent = "<!-- <DIV STYLE='position: absolute; left:10px; top:330px;'><font face='Verdana' size='1'><A HREF='albumart.asp?page=8' TARGET='_top'>front</A>&nbsp;-&nbsp;back</DIV> -->" 
	
	Case FMRRNC1773
		sTitle = "Dented Gear - FMR Audio Really Nice Compressor"
		sImgURL = "http://www.fmraudio.com/images/front_panel.gif"
		sContent = "<!-- <DIV STYLE='position: absolute; left:10px; top:330px;'><font face='Verdana' size='1'><A HREF='albumart.asp?page=8' TARGET='_top'>front</A>&nbsp;-&nbsp;back</DIV> -->" 
	
	Case AMPEX601
		sTitle = "Dented Gear - Ampex 601 Microphone Pre-Amplifier"
		sImgURL = "http://members.ozemail.com.au/~bassboy/getreel/images/ampex601.jpg"
		sContent = "<!-- <DIV STYLE='position: absolute; left:10px; top:330px;'><font face='Verdana' size='1'><A HREF='albumart.asp?page=8' TARGET='_top'>front</A>&nbsp;-&nbsp;back</DIV> -->" 
	
	Case BIPORT2X4S
		sTitle = "Dented Gear - MidiMan BiPort 2X4S Midi / Sync Interface"
		sImgURL = "http://www.midiman.com/images/biport.jpg"
		sContent = "<!-- <DIV STYLE='position: absolute; left:10px; top:330px;'><font face='Verdana' size='1'><A HREF='albumart.asp?page=8' TARGET='_top'>front</A>&nbsp;-&nbsp;back</DIV> -->" 
	
	Case ROLANDRE201
		sTitle = "Dented Gear - Roland RE 201 Tape Echo with Spring Reverb"
		sImgURL = "http://www.btinternet.com/~waveviolator/re201folder/re201.jpg"
		sContent = "<!-- <DIV STYLE='position: absolute; left:10px; top:330px;'><font face='Verdana' size='1'><A HREF='albumart.asp?page=8' TARGET='_top'>front</A>&nbsp;-&nbsp;back</DIV> -->" 
	
	Case MOOGMG1
		sTitle = "Dented Gear - Moog / Realistic MG-1 Concertmate Monophonic Analog Synth"
		sImgURL = "http://www.vintagesynth.org/moog/mg1.jpg"
		sContent = "<!-- <DIV STYLE='position: absolute; left:10px; top:330px;'><font face='Verdana' size='1'><A HREF='albumart.asp?page=8' TARGET='_top'>front</A>&nbsp;-&nbsp;back</DIV> -->" 
	
	Case ARPSOLUS
		sTitle = "Dented Gear - ARP Solus Monophonic Analog Synth"
		sImgURL = "http://www.vintagesynth.org/arp/solus.jpg"
		sContent = "<!-- <DIV STYLE='position: absolute; left:10px; top:330px;'><font face='Verdana' size='1'><A HREF='albumart.asp?page=8' TARGET='_top'>front</A>&nbsp;-&nbsp;back</DIV> -->" 
	
	Case ROLANDSH1000
		sTitle = "Dented Gear - Roland SH 1000 Monophonic Analog Synth"
		sImgURL = "http://www.anz123.com/VSM/graphics/g_rolands/sh1000/sh1000.jpg"
		sContent = "<!-- <DIV STYLE='position: absolute; left:10px; top:330px;'><font face='Verdana' size='1'><A HREF='albumart.asp?page=8' TARGET='_top'>front</A>&nbsp;-&nbsp;back</DIV> -->" 
	
	Case KORG700S
		sTitle = "Dented Gear - Korg MiniKorg 700S Monophonic Analog Synth"
		sImgURL = "http://www.anz123.com/VSM/graphics/g_korgs/k700s/s700s.jpg"
		sContent = "<!-- <DIV STYLE='position: absolute; left:10px; top:330px;'><font face='Verdana' size='1'><A HREF='albumart.asp?page=8' TARGET='_top'>front</A>&nbsp;-&nbsp;back</DIV> -->" 
	
	Case KORG700
		sTitle = "Dented Gear - Korg MiniKorg 700 Monophonic Analog Synth"
		sImgURL = "http://www.timpatton.com/univox/pics/keyboards/minikorgfront.jpg"
		sContent = "<!-- <DIV STYLE='position: absolute; left:10px; top:330px;'><font face='Verdana' size='1'><A HREF='albumart.asp?page=8' TARGET='_top'>front</A>&nbsp;-&nbsp;back</DIV> -->" 
	
	Case ACETONETOP1
		sTitle = "Dented Gear - AceTone Top 1 Organ"
		sImgURL = "http://www.sharkattackmusic.com/dented/images/dented-acetone-top1.jpg"
		sContent = "<!-- <DIV STYLE='position: absolute; left:10px; top:330px;'><font face='Verdana' size='1'><A HREF='albumart.asp?page=8' TARGET='_top'>front</A>&nbsp;-&nbsp;back</DIV> -->" 
	
	Case ACETONERHYTHMACE
		sTitle = "Dented Gear - AceTone Rhythm Ace FR-1 Drum Machine"
		sImgURL = "http://www.keyboardmuseum.org/pic/a/ace/fr1.jpg"
		sContent = "<!-- <DIV STYLE='position: absolute; left:10px; top:330px;'><font face='Verdana' size='1'><A HREF='albumart.asp?page=8' TARGET='_top'>front</A>&nbsp;-&nbsp;back</DIV> -->" 
	
	Case FARFISAFAST4
		sTitle = "Dented Gear - Farfisa FAST 4 Organ"
		sImgURL = "http://www.sharkattackmusic.com/dented/images/dented-farfisa-fast4.jpg"
		sContent = "<!-- <DIV STYLE='position: absolute; left:10px; top:330px;'><font face='Verdana' size='1'><A HREF='albumart.asp?page=8' TARGET='_top'>front</A>&nbsp;-&nbsp;back</DIV> -->" 
	
	Case FARFISAVIP233
		sTitle = "Dented Gear - Farfisa VIP 233 Organ"
		sImgURL = "http://www.sharkattackmusic.com/dented/images/dented-farfisa-vip233.jpg"
		sContent = "<!-- <DIV STYLE='position: absolute; left:10px; top:330px;'><font face='Verdana' size='1'><A HREF='albumart.asp?page=8' TARGET='_top'>front</A>&nbsp;-&nbsp;back</DIV> -->" 
	
	Case HOHNERPIANETT
		sTitle = "Dented Gear - Hohner Pianet T Electric Piano"
		sImgURL = "http://www.lasercentrum.se/stefan/t.jpg"
		sContent = "<!-- <DIV STYLE='position: absolute; left:10px; top:330px;'><font face='Verdana' size='1'><A HREF='albumart.asp?page=8' TARGET='_top'>front</A>&nbsp;-&nbsp;back</DIV> -->" 
	
	Case RHODESSTAGEMARK1
		sTitle = "Dented Gear - Rhodes Stage Piano Mark 1"
		sImgURL = "http://www.fenderrhodes.org/rhodes/supersite/pictures/stage1b.jpg"
		sContent = "<!-- <DIV STYLE='position: absolute; left:10px; top:330px;'><font face='Verdana' size='1'><A HREF='albumart.asp?page=8' TARGET='_top'>front</A>&nbsp;-&nbsp;back</DIV> -->" 
	
	Case ROLANDMC303
		sTitle = "Dented Gear - Roland MC 303 GrooveBox"
		sImgURL = "http://www.rolandgroove.com/images/products/mc-303lrg.jpg"
		sContent = "<!-- <DIV STYLE='position: absolute; left:10px; top:330px;'><font face='Verdana' size='1'><A HREF='albumart.asp?page=8' TARGET='_top'>front</A>&nbsp;-&nbsp;back</DIV> -->" 
	
	Case CASIOSK1
		sTitle = "Dented Gear - Casio SK 1 Sampler Keyboard"
		sImgURL = "http://www.vintagesynth.org/casio/sk1.jpg"
		sContent = "<!-- <DIV STYLE='position: absolute; left:10px; top:330px;'><font face='Verdana' size='1'><A HREF='albumart.asp?page=8' TARGET='_top'>front</A>&nbsp;-&nbsp;back</DIV> -->" 
	
	Case FENDER65TWINREVERB
		sTitle = "Dented Gear - Fender '65 Twin Reverb Reissue Amplifier"
		sImgURL = "http://www.fender.com/amplification/guitaramps/images/vin_65twinrvb.jpeg"
		sContent = "<!-- <DIV STYLE='position: absolute; left:10px; top:330px;'><font face='Verdana' size='1'><A HREF='albumart.asp?page=8' TARGET='_top'>front</A>&nbsp;-&nbsp;back</DIV> -->" 
	
	Case FENDER63VIBROVERB
		sTitle = "Dented Gear - Fender '63 Vibroverb Reissue Amplifier"
		sImgURL = "http://www.ampwares.com/ffg/vibroverb_63ri_f.jpg"
		sContent = "<!-- <DIV STYLE='position: absolute; left:10px; top:330px;'><font face='Verdana' size='1'><A HREF='albumart.asp?page=8' TARGET='_top'>front</A>&nbsp;-&nbsp;back</DIV> -->" 
	
	Case TRAYNORYGM3
		sTitle = "Dented Gear - Traynor YGM 3 Guitar Mate Reverb Amplifier"
		sImgURL = "http://www.sharkattackmusic.com/dented/images/dented-traynor-ygm3.jpg"
		sContent = "<!-- <DIV STYLE='position: absolute; left:10px; top:330px;'><font face='Verdana' size='1'><A HREF='albumart.asp?page=8' TARGET='_top'>front</A>&nbsp;-&nbsp;back</DIV> -->" 
	
	Case SILVERTONE1482
		sTitle = "Dented Gear - Silvertone 1482 Amplifier"
		sImgURL = "http://www.marvicsigns.com/images/1482.jpg"
		sContent = "<!-- <DIV STYLE='position: absolute; left:10px; top:330px;'><font face='Verdana' size='1'><A HREF='albumart.asp?page=8' TARGET='_top'>front</A>&nbsp;-&nbsp;back</DIV> -->" 
	
	Case HARMONYLAPSTEEL
		sTitle = "Dented Gear - Harmony Lap Steel"
		sImgURL = "http://www.broadwaymusicco.com/hsteel5.jpg"
		sContent = "<!-- <DIV STYLE='position: absolute; left:10px; top:330px;'><font face='Verdana' size='1'><A HREF='albumart.asp?page=8' TARGET='_top'>front</A>&nbsp;-&nbsp;back</DIV> -->" 
	
	Case HOHNERMELODICA
		sTitle = "Dented Gear - Hohner Melodica"
		sImgURL = "http://www.musicalinstruments.com/images/Hohner/Harmonicas/HM900a.jpg"
		sContent = "<!-- <DIV STYLE='position: absolute; left:10px; top:330px;'><font face='Verdana' size='1'><A HREF='albumart.asp?page=8' TARGET='_top'>front</A>&nbsp;-&nbsp;back</DIV> -->" 
	
	Case Else
		'default main page
		sTitle = "SRK HOME"
		sImgURL = "http://www.sharkattackmusic.com/newish/images/roadsandcars-header-18.jpg"
		sContent = "<!-- <DIV STYLE='position: absolute; left:10px; top:330px;'><font face='Verdana' size='1'><A HREF='albumart.asp?page=8' TARGET='_top'>go home</A></DIV> -->"
		
End Select

'---------------------------------------------

'*****************************************************************************
'HTML template below
'*****************************************************************************

%>

<HTML>
<HEAD>
<META HTTP-EQUIV="Content-Type" content="text/html; charset=iso-8859-1">
<TITLE><%= sTitle %></TITLE>

</HEAD>
<body marginheight=0 marginwidth=0 topmargin=0 leftmargin=0 text="Silver" link="Red" vlink="Red" alink="White">
<img src="<%= sImgURL %>" border="0" alt="" hspace="0" vspace="0"><br>
<%= sContent %>
</BODY>
</HTML>
