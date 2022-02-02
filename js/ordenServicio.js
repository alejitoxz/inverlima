function AbrirModalRegistroOrdenServicio(){
    $("#modal_registro_OrdenServicio").modal({backdrop:'static',keyboard:false})
    $("#modal_registro_OrdenServicio").modal('show');
    $(document).ready(function(){
        $('.js-example-basic-single').select2();
        $("#modal_registro_OrdenServicio").on('shown.bs.modal',function(){
        });
    
        // inicimos wizzard
          // BS-Stepper Init
          window.stepper = new Stepper(document.querySelector('.bs-stepper'))
          
          
        
    
      });
}