var app = document.getElementById('title');

var typewriter = new Typewriter(app, {
    loop: true
});

typewriter.typeString('Comming Soon')
    .pauseFor(2500)
    .deleteAll()
    .typeString('6Flames')
    .pauseFor(2500)
    .deleteAll()
    .typeString('<strong>Backend Engineer</strong>')
    .pauseFor(2500)
    .start();