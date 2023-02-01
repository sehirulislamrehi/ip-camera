<!-- <html>
    <head></head>
    <body>
        <button id="button">Click</button>
    </body>
    <script>
        let button = document.getElementById("button")
        button.onclick = () => {
            let params = `scrollbars=no,resizable=no,status=no,location=no,toolbar=yes,menubar=yes,
            width=600,height=600,left=-1000,top=-1000`;
            window.open('http://admin:123456@172.17.243.8/ISAPI/Streaming/channels/102/httpPreview','test',params);
        };
    </script>
</html> -->
<!DOCTYPE html>
<html lang="en">

<head>
    <script type="text/javascript" src="https://flashphoner.com/downloads/builds/flashphoner_client/wcs_api-2.0/current/flashphoner.js"></script>
</head>
<style>
    .fp-Video {
        border: 1px double black;
        width: 322px;
        height: 242px;
    }

    .display {
        width: 100%;
        height: 100%;
        display: inline-block;
    }

    .display>video,
    object {
        width: 100%;
        height: 100%;
    }
</style>

<body >
    <div class="fp-Video">
        <div id="play" class="display"></div>
    </div>
    <br />
    <button id="playBtn">PLAY</button>


        <SCRIPT language=JavaScript>
        if ((navigator.appName == "Microsoft Internet Explorer")&&(navigator.platform != "MacPPC"))
        {
        document.write("<OBJECT ID=\"VAtCtrl\" WIDTH=362 HEIGHT=310 name=\"VAtCtrl\"");
        document.write(" CLASSID=CLSID:210D0CBC-8B17-48D1-B294-1A338DD2EB3A");
        document.write(" CODEBASE=\"http://172.17.107.25:554/VatDec.cab#version=1,0,0,48\">");
        document.write("<PARAM NAME=\"Url\" VALUE=\"http://172.17.107.25:554/cgi-bin/control.cgi\">");
        document.write("<PARAM NAME=\"VSize\" VALUE=\"SIF\">");
        document.write("<PARAM NAME=\"Language\" VALUE=\"en\">");
        document.write("<PARAM NAME=\"Deblocking\" VALUE=\"true\">");
        document.write("<PARAM NAME=\"DisplayTimeFormat\" VALUE=\"1\">");
        document.write("<PARAM NAME=\"DigitalZoomEnableChk\" VALUE=\"true\">");
        document.write("<PARAM NAME=\"DigitalZoomEdit\" VALUE=\"true\">");
        document.write("</OBJECT>");
        }
        </SCRIPT>
</body>

</html>