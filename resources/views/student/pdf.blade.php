<style>

body{
    font-family: Arial;
}
.titulo{
    text-align: center;
    font-size:20;
    font-weight: bold;
    margin-bottom: 50px;
}

.subtitulo{
    text-align: left;
    font-size:15;
    font-weight: bold;
    margin-bottom: 20px;
    margin-top: 20px;
}

.detalles{
    font-size:12;
    text-align: left;
}

.pie_pagina{
    font-style: bold;
    text-align: center;

}
</style>

<body>

    <div class="titulo">
        Ficha de estudiante
    </div>

    <div class="subtitulo">
        Antecedentes Personales del Niño(a)
    </div>

    <div class="detalles">
        <b>Nombre Completo:</b> {{$student->name}}<br/>
        <b>Rut:</b> {{$student->rut}}<br/>
        <b>Año de Nacimiento: </b> {{$student->birthday}}<br/>
        <b>Categoria:</b> {{$student->category->name}}<br/>
        <b>Telefono:</b> {{$student->phone}}<br/>
        <b>Altura</b> {{$student->height}}<br/>
        <b>Peso</b>{{$student->weight}}<br/>
    </div>

    <div class="subtitulo">
        Antecedentes Personales del Tutor(a)
    </div>
    <div class="detalles">
        <b>Nombre Completo:</b> {{$student->name}}<br/>
        <b>Telefono:</b> {{$student->rut}}<br/>
        <b>Direccion: </b> {{$student->birthday}}<br/>
    </div>

    <div class="subtitulo">
        Antecedentes  Medicos
    </div>
    <br/><br/><br/><br/>
    <br/><br/><br/><br/>
    <br/><br/><br/><br/>
    <br/><br/><br/><br/>
    <br/><br/><br/><br/>
    <div class="pie_pagina">
        ______________<br/>
        FIRMA TUTOR
    </div>
    <br/><br/>
    <div>
        *Firmo el presente documento, estando en conocimiento y aceptando el reglamento interno, asumiendo mi responsabilidad y compromiso en todas las actividades y reuniones programadas por la escuela de furbol y los apoderados.
    </div>
</body>
