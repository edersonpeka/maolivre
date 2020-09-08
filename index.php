<!DOCTYPE html>
<html dir="ltr" lang="pt-BR" prefix="og: http://ogp.me/ns#">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover" />
    <title>Mão Livre - Aplicativo de Desenho Simples</title>
    <meta content="Aplicativo de desenho simples, pequeno, leve, sem propagandas, sem funcionalidades (não salve, não importe, não exporte, não compartilhe, só rabisque)." name="description" />
    <link rel="canonical" href="https://ederson.peka.nom.br/maolivre/" />
    <meta property="og:title" content="Mão Livre - Aplicativo de Desenho Simples" />
    <meta property="og:description" content="Aplicativo de desenho simples, pequeno, leve, sem propagandas, sem funcionalidades (não salve, não importe, não exporte, não compartilhe, só rabisque)." />
    <meta property="og:image" content="https://ederson.peka.nom.br/maolivre/share.jpg" />
    <meta property="og:url" content="https://ederson.peka.nom.br/maolivre/" />
    <meta property="og:site_name" content="Mão Livre" />
    <meta property="og:locale" content="pt_BR" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@peka" />
    <meta name="twitter:creator" content="@peka" />
    <meta name="twitter:title" content="Mão Livre - Aplicativo de Desenho Simples" />
    <meta name="twitter:description" content="Aplicativo de desenho simples, pequeno, leve, sem propagandas, sem funcionalidades (não salve, não importe, não exporte, não compartilhe, só rabisque)." />
    <meta name="twitter:image" content="https://ederson.peka.nom.br/maolivre/share.jpg" />
    <link rel="apple-touch-icon" sizes="57x57" href="./favicon/apple-icon-57x57.png" />
    <link rel="apple-touch-icon" sizes="60x60" href="./favicon/apple-icon-60x60.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="./favicon/apple-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="76x76" href="./favicon/apple-icon-76x76.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="./favicon/apple-icon-114x114.png" />
    <link rel="apple-touch-icon" sizes="120x120" href="./favicon/apple-icon-120x120.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="./favicon/apple-icon-144x144.png" />
    <link rel="apple-touch-icon" sizes="152x152" href="./favicon/apple-icon-152x152.png" />
    <link rel="apple-touch-icon" sizes="180x180" href="./favicon/apple-icon-180x180.png" />
    <link rel="icon" type="image/png" sizes="192x192" href="./favicon/android-icon-192x192.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="./favicon/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="96x96" href="./favicon/favicon-96x96.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="./favicon/favicon-16x16.png" />
    <link rel="manifest" href="./favicon/manifest.json" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="msapplication-TileColor" content="#CCCCDD" />
    <meta name="msapplication-TileImage" content="./favicon/ms-icon-144x144.png" />
    <meta name="theme-color" content="#CCCCDD" />
    <style>
    * {
        box-sizing: border-box;
        user-select: none;
        overscroll-behavior: none;
        font-family: Calibri, Geneva, 'Arial Narrow', Helvetica, Arial, sans-serif;
        font-size: 18px;
    }
    html, body {
        margin: 0;
        padding: 0;
        background-color: #CCD;
        overflow: hidden;
    }
    body {
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        position: fixed;
    }
    .stage {
        display: grid;
        grid-gap: 3px;
        grid-template-rows: 1fr auto;
        height: calc( 100% - 1vh );
        padding: .5%;
        margin-bottom: 1vh;
    }
   .canvas-container canvas {
        width: 100%;
        height: 100%;
        border: 3px inset #99B;
        background-color: #FFF;
    }
    .controls {
        height: fit-content;
        color: #225;
        text-align: center;
    }
    .controls .buttons {
        display: grid;
        grid-template-columns: repeat( 6, 1fr );
    }
    @media (orientation: landscape) {
        .stage {
            grid-template-columns: 1fr auto;
        }
        .controls .buttons {
            grid-template-columns: 1fr 1fr;
        }
    }
    .controls button {
        margin: 2px;
        box-shadow: 1px 1px 3px rgba( 32, 32, 80, .4 );
        border: 2px solid rgba( 0, 0, 0, .5 );
        border-radius: 5px;
        padding: .3em .5em;
        cursor: pointer;
        outline: none;
        min-width: 2rem;
        min-height: 2rem;
    }
    .controls button.btnColor {
        position: relative;
        opacity: .9;
    }
    .controls button.btnActive {
        opacity: 1;
        box-shadow: 3px 3px 3px rgba( 32, 32, 80, .4 );
    }
    .controls button.btnActive:before {
        position: absolute;
        font-size: 28px;
        font-weight: bold;
        content: '✓';
        left: calc( 50% - 10px );
        top: calc( 50% - 16px );
        color: #EEE;
        text-shadow: -2px 0 4px #333;
    }
    </style>
</head>
<body>

    <div class="stage">
        <div class="canvas-container">
            <canvas></canvas>
        </div>
        <div class="controls">
            <div class="buttons">
                <button class="btnColor btnActive" style="background-color: #000000;">&nbsp;</button>
                <button class="btnColor" style="background-color: #000080;">&nbsp;</button>
                <button class="btnColor" style="background-color: #0000FF;">&nbsp;</button>
                <button class="btnColor" style="background-color: #008000;">&nbsp;</button>
                <button class="btnColor" style="background-color: #00FF00;">&nbsp;</button>
                <button class="btnColor" style="background-color: #800000;">&nbsp;</button>
                <button class="btnColor" style="background-color: #FF0000;">&nbsp;</button>
                <button class="btnColor" style="background-color: #008080;">&nbsp;</button>
                <button class="btnColor" style="background-color: #00FFFF;">&nbsp;</button>
                <button class="btnColor" style="background-color: #808000;">&nbsp;</button>
                <button class="btnColor" style="background-color: #FFFF00;">&nbsp;</button>
                <button class="btnColor" style="background-color: #800080;">&nbsp;</button>
                <button class="btnColor" style="background-color: #FF00FF;">&nbsp;</button>
                <button class="btnColor" style="background-color: #808080;">&nbsp;</button>
                <button class="btnColor" style="background-color: #C0C0C0;">&nbsp;</button>
                <button class="btnColor" style="background-color: #FFFFFF;">&nbsp;</button>
                <button id="btnTamanho" title="Trocar tamanho" style="font-size: 80%; line-height: 1px;">•</button>
                <button id="btnLimpar" title="Limpar">🗑</button>
            </div>
        </div>
    </div>

<script>
function myCanvas( obj ) {
    this.color = '#000000';
    this.lineWidth = 'lineWidth' in localStorage ? parseInt( localStorage.lineWidth ) : 2;
    this.canvas = obj;
    this.ctx = this.canvas.getContext('2d');
    this.ctx.lineCap = 'round';
    this.ctx.lineJoin = 'round';

    this.controls = {
        limpar: document.getElementById('btnLimpar'),
        tamanho: document.getElementById('btnTamanho'),
        cores: document.querySelectorAll('.btnColor')
    };
    this.controls.limpar.addEventListener( 'click', () => {
        this.clear();
    } );
    this.setLineWidth = function ( _w ) {
        if ( _w > 42 ) _w = 2;
        _w = Math.max( _w, 2 );
        this.lineWidth = _w;
        this.controls.tamanho.style.fontSize = ( 80 + ( _w * 2 ) ) + '%';
        localStorage.lineWidth = _w;
        return this;
    }
    this.setLineWidth( this.lineWidth );
    this.controls.tamanho.addEventListener( 'click', () => {
        this.setLineWidth( this.lineWidth + 8 );
    } );
    this.controls.cores.forEach( _cor => {
        _cor.addEventListener( 'click', _ev => {
            document.querySelectorAll('.btnColor.btnActive').forEach( _btn => {
                _btn.classList.remove( 'btnActive' );
            } );
            var _btn = _ev.currentTarget;
            _btn.classList.add( 'btnActive' );
            this.color = _btn.style.backgroundColor;
        } );
    } );
    
    this.mousePressed = false;
    this.mouseLast = [0, 0];
    this.canvas.addEventListener( 'mousedown', (e) => {
        this.mousePressed = true;
        let offset = this.canvas.getBoundingClientRect();
        this.Draw(e.pageX - offset.left, e.pageY - offset.top, false);
    } );
    this.canvas.addEventListener( 'mousemove', (e) => {
        if (this.mousePressed) {
            let offset = this.canvas.getBoundingClientRect();
            this.Draw(e.pageX - offset.left, e.pageY - offset.top, true);
        }
    } );
    this.canvas.addEventListener( 'mouseup', (e) => {
        this.mousePressed = false;
    } );
    this.canvas.addEventListener( 'mouseleave', (e) => {
        this.mousePressed = false;
    } );
    this.canvas.addEventListener( 'touchstart', (e) => {
        var touch = e.touches[0];
        var mouseEvent = new MouseEvent( 'mousedown', {
          clientX: touch.clientX,
          clientY: touch.clientY
        } );
        this.canvas.dispatchEvent( mouseEvent );
    } );
    this.canvas.addEventListener( 'touchmove', (e) => {
        var touch = e.touches[0];
        var mouseEvent = new MouseEvent( 'mousemove', {
          clientX: touch.clientX,
          clientY: touch.clientY
        } );
        this.canvas.dispatchEvent( mouseEvent );
    } );
    this.canvas.addEventListener( 'touchend', (e) => {
        var mouseEvent = new MouseEvent( 'mouseup', {});
        this.canvas.dispatchEvent( mouseEvent );
    } );
    this.Draw = function( x, y, isDown ) {
        if ( isDown ) {
            this.ctx.beginPath();
            this.ctx.strokeStyle = this.color;
            this.ctx.lineWidth = this.lineWidth;
            this.ctx.lineJoin = "round";
            this.ctx.moveTo(this.mouseLast[0], this.mouseLast[1]);
            this.ctx.lineTo(x, y);
            this.ctx.closePath();
            this.ctx.stroke();
        }
        this.mouseLast = [x, y];
    }

    this.calcSize = function () {
        let _img_data = this.ctx.getImageData( 0, 0, this.canvas.width, this.canvas.height );
        this.canvas.width = this.canvas.scrollWidth;
        this.canvas.height = this.canvas.scrollHeight;
        this.ctx.putImageData( _img_data, 0, 0 );
        return this;
    }
    this.calcSize();
    window.addEventListener( 'resize', this.calcSize );
    this.clear = function( callback ) {
        window.requestAnimationFrame( () => {
            this.ctx.save();
            this.ctx.fillStyle = '#FFF';
            this.ctx.fillRect(
                0,
                0,
                this.canvas.width,
                this.canvas.height
            );
            this.ctx.restore();
            if ( callback ) callback();
        } );
        return this;
    }

    return this;
}
function preventBodyScroll( e ) {
    if ( e.target == canvas ) {
        try {
            e.preventDefault();
        } catch ( err ) {
            console.log(err)
        }
    }
    return false;
}
window.addEventListener( 'load', () => {
    let canvas = document.querySelector('canvas');
    let my = myCanvas( canvas );

    document.body.addEventListener( 'touchstart', preventBodyScroll, {passive: false} );
    document.body.addEventListener( 'touchend', preventBodyScroll, {passive: false} );
    document.body.addEventListener( 'touchmove', preventBodyScroll, {passive: false} );

    if ( 'serviceWorker' in navigator ) {
        let _base = document.location.href.split('/').slice(0,-1);
        let _swurl = _base.join( '/' ) + '/serviceworker.js.php';
        navigator.serviceWorker.getRegistrations().then( registrations => {
            let _registered = false;
            for ( let registration of registrations ) {
                if ( registration.active.scriptURL != _swurl ) {
                    registration.unregister();
                    console.info( 'ServiceWorker removido: ', registration.active.scriptURL );
                } else {
                    _registered = true;
                    console.info( 'ServiceWorker já registrado: ', registration.active.scriptURL );
                }
            }
            if ( !_registered ) {
                navigator.serviceWorker.register( _swurl ).then( function( registration ) {
                    console.info( 'ServiceWorker registrado no escopo: ', registration.scope );
                } ).catch( function( err ) {
                    console.info( 'Falha no registro do ServiceWorker', err );
                } );
            }
        } );
    }
} );

(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o), m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
ga('create', 'UA-34876640-1', 'auto');
ga('send', 'pageview');
</script>
</body>
</html>
