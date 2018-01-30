 

function loadTabla(){
 
    $.get("./ajax/tabla.php","",function(data){
      $("#tabla").html(data);
    })
  
  }

  loadTabla();

function agregarCliente(){
    e.preventDefault();
    alert('agregar');
    userData = $("#form_1").serialize();
   
    $.ajax({
        type: 'POST',
        url: './ajax/actions.php',
        data: 'action=registrar&'+userData,
        success:function(msg){
            if(msg == 'ok'){
                loadTabla();
            }else{
                alert('Some problem occurred, please try again.');
            }
        }
    });
}
function actualizarCliente(){
    userData = $("#form_1").serialize();
    alert('actualizar11');
    $.ajax({
        type: 'POST',
        url: './ajax/actions.php',
        data: 'action=actualizar&'+userData,
        success:function(msg){
            if(msg == 'ok'){
                loadTabla();
            }else{
                alert('Some problem occurred, please try again.');
            }
        }
    });
}

function eliminarCliente(id){

    $.ajax({
        type: 'POST',
        url: './ajax/actions.php',
        data: 'action=eliminar&id='+id,
        success:function(msg){
            if(msg == 'ok'){
                loadTabla();
            }else{
                alert('Some problem occurred, please try again.');
            }
        }
    });
}
function editarCliente(id)
{ 
    
    $.ajax({
        type: 'POST',
        url: './ajax/actions.php',
        data: 'action=editar&id='+id,
        dataType:"json",
        success:function(dat){
            
            console.log(dat);
                $('#id').val(dat.id);
                $('#Nombre').val(dat.Nombre);
                $('#Apellido').val(dat.Apellido);
                $('#Sexo').val(dat.Sexo);
                $('#FechaNacimiento').val(dat.FechaNacimiento);
                document.getElementById("agregar").textContent="Actualizar";
                document.getElementById("agregar").onclick = function() { actualizarCliente(); }
                document.getElementById("agregar").id = "actualizar";
                
                loadTabla();
           
        }
    });

}
  


$("#nuevo").click(function(e){
    e.preventDefault();
    document.getElementById("form_1").reset();
});
