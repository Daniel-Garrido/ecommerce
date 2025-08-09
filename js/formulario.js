emailjs.init("Ic_0byHMDqakp2g3h");

document.getElementById("formContacto").addEventListener("submit", function (e) {
    e.preventDefault();

    const nombre = document.getElementById("nombre").value.trim();
    const correo = document.getElementById("correo").value.trim();
    const servicio = document.getElementById("servicio").value.trim();

    //validaciones a los datos del formulario

    if (nombre.length < 3) {
      return Swal.fire("Nombre no válido");
    }

    //expresion regular para validar formulario
    if (!/\S+@\S+\.\S+/.test(correo)) {
      return Swal.fire("correo no válido");
    }

    if (servicio.length < 10) {
      return Swal.fire(" Mensaje muy corto");
    }

    //Mostrar alert de enviando
    Swal.fire({
      title: "Enviando...",
      text: "por favor espere",
      allowOutsideClick: false,
      didOpen: () => Swal.showLoading(),
    });

    // enviar el mensaje usando la libreria de EmailJS
    emailjs
      .sendForm("service_hm5ea3l", "template_vy85fmg", this)
      .then(() => {
        Swal.fire("Enviando, El mensaje se envio correctamente");
        this.reset();
      })
      .catch((err) => {
        Swal.fire("Error", "No se pudo enviar el mensaje" + err.text);
      });
  });

   console.log("formulario de contacto");
