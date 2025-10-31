function nucleo()
            {
                    var ctx = document.getElementById('comportamienton').getContext('2d');

                    roundedRect(ctx, 0, 0, 200, 200, 20,"#1c74ac");
                    roundedRect(ctx, 0, 200, 200, 200, 20,"#009540");
                    roundedRect(ctx, 200, 0, 200, 200, 20,"#f4bc00");
                    roundedRect(ctx, 200, 200, 200, 200, 20,"#e40439");

                    ctx.globalAlpha = 1;
                    ctx.fillStyle = "#FFFFFF";
                    ctx.font = "bold 34px sans-serif";
                    ctx.fillText("Q",50,40);
                    ctx.fillText("D",340,40);
                    ctx.fillText("U",50,380);
                    ctx.fillText("A",340,380);

                    ctx.strokeStyle = '#FFFFFF';
                    ctx.lineWidth=1.5;

                    //EJEy
                    ctx.beginPath();
                    ctx.moveTo(200,0);
                    ctx.lineTo(200,400);
                    ctx.stroke();
                    ctx.closePath();
                    //EJE X
                    ctx.beginPath();
                    ctx.moveTo(0,200);
                    ctx.lineTo(400,200);
                    ctx.stroke();
                    ctx.closePath();

                    ctx.lineWidth=0.5;

                    ctx.beginPath();
                    ctx.moveTo(0,0);
                    ctx.lineTo(200,200);
                    ctx.stroke();
                    ctx.closePath();

                    ctx.beginPath();
                    ctx.moveTo(400,0);
                    ctx.lineTo(200,200);
                    ctx.stroke();
                    ctx.closePath();

                    ctx.beginPath();
                    ctx.moveTo(0,400);
                    ctx.lineTo(200,200);
                    ctx.stroke();
                    ctx.closePath();

                    ctx.beginPath();
                    ctx.moveTo(400,400);
                    ctx.lineTo(200,200);
                    ctx.stroke();
                    ctx.closePath();

                    ctx.fillStyle = "#FFFFFF";
                    // set transparency value
                    ctx.globalAlpha = 0.2;
                    // Draw semi transparent circles
                    for (var i = 0; i < 4; i++) {
                    ctx.beginPath();
                    ctx.arc(200, 200, 25 + 50 * i, 0, Math.PI * 2, true);
                    ctx.fill();
                    }

                    ctx.globalAlpha = 1;
                    //$PT_NUCLEO_AZ
                    var ptq =  Math.sqrt(Math.pow({{$PT_NUCLEO_AZ ?? 0}}, 2)/2);
                    var ptu =  Math.sqrt(Math.pow({{$PT_NUCLEO_VE ?? 0}}, 2)/2);
                    var pta =  Math.sqrt(Math.pow({{$PT_NUCLEO_RO ?? 0}}, 2)/2);
                    var ptd =  Math.sqrt(Math.pow({{$PT_NUCLEO_AM ?? 0}}, 2)/2);
                    //alert (ptu);
                    var ptqX = 200 - ptq;
                    var ptqY = 200 - ptq;
                    var ptuX = 200 - ptu;
                    var ptuY = 200 + ptu;
                    var ptaX = 200 + pta;
                    var ptaY = 200 + pta;
                    var ptdX = 200 + ptd;
                    var ptdY = 200 - ptd;

                    //NUEVA LINEA
                    ctx.strokeStyle = '#FFFFFF';
                    ctx.lineWidth=2;
                    ctx.beginPath();
                    ctx.moveTo(ptqX,ptqY);
                    ctx.lineTo(ptuX,ptuY);
                    ctx.lineTo(ptaX,ptaY);
                    ctx.lineTo(ptdX,ptdY);
                    ctx.lineTo(ptqX,ptqY);

                    ctx.stroke();
                    ctx.closePath();
                    var pointSize = 6;
                    ctx.fillStyle = "#1c74ac";

                    ctx.beginPath(); // Punto Q
                    ctx.arc(ptqX, ptqY, pointSize, 0, Math.PI * 2, true);
                    ctx.fill();
                    ctx.closePath();



                    ctx.fillStyle = "#009540";
                    ctx.beginPath(); // Punto U
                    ctx.arc(ptuX, ptuY, pointSize, 0, Math.PI * 2, true);
                    ctx.fill(); // Terminar trazo
                    ctx.closePath();

                    ctx.fillStyle = "#e40439";
                    ctx.beginPath(); // Punto A
                    ctx.arc(ptaX, ptaY, pointSize, 0, Math.PI * 2, true);
                    ctx.fill(); // Terminar trazo
                    ctx.closePath();

                    ctx.fillStyle = "#f4bc00";
                    ctx.beginPath(); // Punto D
                    ctx.arc(ptdX, ptdY, pointSize, 0, Math.PI * 2, true);
                    ctx.fill(); // Terminar trazo
                    ctx.closePath();

                    ctx.fillStyle = "#000000";
                    ctx.font = "16px sans-serif";
                    ctx.fillText({{$PT_NUCLEO_AZ ?? 0}},ptqX -5 ,ptqY -5);
                    ctx.fillText({{$PT_NUCLEO_VE ?? 0}},ptuX -10 ,ptuY +10);
                    ctx.fillText({{$PT_NUCLEO_RO ?? 0}},ptaX +5 ,ptaY +5);
                    ctx.fillText({{$PT_NUCLEO_AM ?? 0}},ptdX +5 ,ptdY -5);


            };

            function roundedRect(ctx,x,y,width,height,radius,color)
            {
                ctx.beginPath();
                ctx.fillStyle = color;
                ctx.moveTo(x,y+radius);
                ctx.lineTo(x,y+height-radius);
                ctx.quadraticCurveTo(x,y+height,x+radius,y+height);
                ctx.lineTo(x+width-radius,y+height);
                ctx.quadraticCurveTo(x+width,y+height,x+width,y+height-radius);
                ctx.lineTo(x+width,y+radius);
                ctx.quadraticCurveTo(x+width,y,x+width-radius,y);
                ctx.lineTo(x+radius,y);
                ctx.quadraticCurveTo(x,y,x,y+radius);
                ctx.fill();
                //ctx.stroke();
            }
