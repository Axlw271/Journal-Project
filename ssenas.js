const dictionary = {
    a: "../abcs/a.jpeg",
      b: "../abcs/b.jpeg",
      c: "../abcs/c.jpeg",
      d: "../abcs/d.jpeg",
      e: "../abcs/e.jpeg",
      f: "../abcs/f.jpeg",
      g: "../abcs/g.jpeg",
      h: "../abcs/h.jpeg",
      i: "../abcs/i.jpeg",
      j: "../abcs/j.jpeg",
      k: "../abcs/k.jpeg",
      l: "../abcs/l.jpeg",
      m: "../abcs/m.jpeg",
      n: "../abcs/n.jpeg",
      ñ: "../abcs/ñ.jpeg",
      o: "../abcs/o.jpeg",
      p: "../abcs/p.jpeg",
      q: "../abcs/q.jpeg",
      r: "../abcs/r.jpeg",
      s: "../abcs/s.jpeg",
      t: "../abcs/t.jpeg",
      u: "../abcs/u.jpeg",
      v: "../abcs/v.jpeg",
      w: "../abcs/w.jpeg",
      x: "../abcs/x.jpeg",
      y: "../abcs/y.jpeg",
      z: "../abcs/z.jpeg",
      0: "../abcs/0.JPG"
    };
    sopatxt=document.getElementById("sopa").innerText
    var lista=arreglo(sopatxt)
    lista.sort(tamano)
    n=lista[0].length+Math.ceil(lista[0].length/3)
    sz=Math.min(window.innerWidth/n,(window.innerHeight-200)/n)
    var sopa=[]
    var px=py=100
    dir=-1
    crear()
    palabra=""
    resueltos=0
    highs=[]
    imprimir()
    
    function arreglo(sopa){
        string = sopa
        delimiter = " "
        split_string = string.split(delimiter)
        return split_string
    }
    function llenar(){
        for(i=0;i<n;i++)
            for(j=0;j<n;j++)
                if(sopa[i][j]=="0")
                    sopa[i][j]=letraloca()
    }
    function crear(){
        initsop()
        for(j=0;j<lista.length;j++){
        if(moneda()==1){
            incluir(reverse(String(lista[j])))
            
        }else{
            incluir(lista[j])
        }
        }
        llenar()
    }
    function moneda(){
        return Math.round(Math.random())
    }
    function incluir(pal){
        if(pal!=undefined){
        if(moneda()==1){    
            x=Math.floor(Math.random()*(n-pal.length))
            y=Math.floor(Math.random()*n)
            if(verificar(x,y,1,0,pal))        
                ingresar_palabra(x,y,1,0,pal)
            else
                    acomodar(x,y,pal)
        }else{
            x=Math.floor(Math.random()*n)
            y=Math.floor(Math.random()*(n-pal.length))
            if(verificar(x,y,0,1,pal))
                ingresar_palabra(x,y,0,1,pal)
            else
                acomodar(x,y,pal)
        }
        }
    }
    function ingresar_palabra(x,y,j,k,pal){
        for(i=0;i<pal.length;i++)
                    sopa[x+j*i][y+k*i]=pal.charAt(i)
    }
    function acomodar(a,b,pal){
        k=b
        for(l=a;l<n-pal.length;l++)
            for(k=b;k<n;k++)
                if(verificar(l,k,1,0,pal)){
                    ingresar_palabra(l,k,1,0,pal)
                    l=k=100
                }           
        if( k==n && l==n-pal.length){
            for(l=0;l<n;l++)
            for(k=0;k<n-pal.length;k++)
                if(verificar(l,k,0,1,pal)){
                    ingresar_palabra(l,k,0,1,pal)
                    l=k=100
                }
        }
        if(k==n-pal.length && l==n){
            lista.pop(lista.indexOf(pal))
        }
    }
    function verificar(x,y,j,k,pal){
        var out=true
        for(i=0;i<pal.length;i++)
            if(sopa[x+j*i][y+k*i]=="0"||sopa[x+j*i][y+k*i]==pal.charAt(i)){
            }else{
                out=false
            }
        return out;
    }
    function initsop(){
    for(i=0;i<n;i++){
        sopa.push([])
    }    
    for(i=0;i<n;i++)
        for(j=0;j<n+1;j++)
            sopa[i][j]="0"
}
    function imprimir(){   
    document.writeln("<table>")
    for(i=0;i<n;i++){
        document.writeln("<tr>")
        for(j=0;j<n;j++){0
            document.writeln("<td style='width :"+sz+"px; height: "+sz+"px;' id='"+i+","+j+"' onclick=high("+i+","+j+")><img style='width :"+(sz-4)+"px; height: "+(sz-4)+"px; margin-top:8px' id='"+i+","+j+"' src="+dictionary[sopa[i][j]]+"></td>")
        }
        document.writeln("</tr>")
    }
    document.writeln("</table>")
}
    function high(x,y){
        elemento=document.getElementById(x+","+y)           
        if(contiguos(px,py,x,y))
            if(elemento.classList=="highlighted"){            
                elemento.classList=""
                highs.pop(highs.indexOf(elemento))
                palabra=reverse(palabra)
                palabra.replace(elemento.innerText,"")
                palabra=reverse(palabra)
            }
            else{
                elemento.classList="highlighted"
                highs.push(elemento)
                palabra+=sopa[x][y]
                
            }
        else{
            borrar()
        }
        
        if(px==100){
            elemento.classList="highlighted"
            highs.push(elemento)
            palabra+=sopa[x][y]
        }
        px=x
        py=y
        if(lista.includes(palabra)||lista.includes(reverse(palabra)))
            verdes()
        if(resueltos==lista.length){
            alert("Actividad completada!")
            registro()}
    }
    function registro(){
        const data = new URLSearchParams("act_id=sseñ & resultado=10");
        fetch('../resultado.php', {
        method: 'POST',
        body: data
        })
        .then(function(response) {
        if(response.ok) {
            return response.text()
        } else {
            throw "Error en la llamada Ajax";
        }

        })
        .then(function(texto) {
        console.log(texto);
        })
        .catch(function(err) {
        console.log(err);
        });}
    function verdes(){
        for(i=0;i<highs.length;i++){
                highs[i].classList="solved"
            }
        highs=[]
        resueltos++
    }
    function borrar(){
        for(i=0;i<highs.length;i++){
                highs[i].classList=""
            }
            palabra=""
    }
    function contiguos(px,py,x,y){
        if((Math.abs((px-x))+Math.abs(py-y))<=1)
            return true
        else 
            return false
    }
    function reverse(pal){
        out=""
        for(i=0;i<pal.length;i++)
            out+=pal.charAt(pal.length-i-1)
        return out
    }
    function tamano(a,b){
       if(a!=undefined && b!=undefined)
        return b.length-a.length
    }
    function letraloca(){
        var abc="abcdefghijklmnopqrstuvwxyz"
        return abc[Math.floor(Math.random()*abc.length)]
    }
