<?php

require('../../conexionbd/session.php');

$sql = "SELECT c.curso,c.tipo,CONCAT(l.apellidos,' ',l.nombres) as docente ,c.fecha,c.id from calificaciones_r c join login l on c.dni = l.dni order by c.fecha, docente  ";

$result = $connect->query($sql);

$output = array('data' => array());

if ($result->num_rows > 0) {

    while ($row = $result->fetch_array()) {
      $id_prueba=$row[4];
            $button = '<!-- Single button -->
              <button class="btn btn-warning glyphicon glyphicon-pencil" data-toggle="modal" id="editUserModalBtn" data-target="#editCalModal" onclick="editClasificacion(' . $userId . ')"></button>';
             $button2 = '<!-- Single button -->
              <button class="btn btn-danger glyphicon glyphicon-remove" data-toggle="modal" onclick="preguntarSiNoCurso('.$id_prueba.')"></button>';
          
        $myDate3 = new DateTime($row[3]);
        $formatofecha = $myDate3->format('d/m/Y');
        
        $output['data'][] = array(
            //curso
            $row[0],
            // tipo		
            $row[1],
            //docente	3
            $row[2],
            //fecha
            $formatofecha,
            $button,
            $button2
        );
    } // /while 
}// if num_rows

$connect->close();

echo json_encode($output);
