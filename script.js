function confirmerSuppression(id) {
  if (confirm("Êtes-vous sûr de vouloir supprimer cet apprenant ?")) {
      window.location.href = "delete-apprenant.php?id=" + id;
  }
}
  
function confirmerModif(form) {
    if (window.confirm("Êtes-vous sûr de vouloir modifier cet apprenant ?")) {
        form.submit();
    }
}
