const expr = require('express');
const serv = expr();
const port = 4000;

serv.get("/json", function(req, res) {
    res.json({ message: "hello world" });
});

serv.use('/', expr.static(__dirname + '/htmls/'));

serv.use('/css', expr.static(__dirname + '/css'));
serv.use('/js', expr.static(__dirname + '/js'));
serv.use('/imgs', expr.static(__dirname + '/imgs'));
serv.use('/tarjeta', expr.static(__dirname+'/tarjetas'));

serv.listen(port, function() {
    console.log(`servidor iniciado`);
})