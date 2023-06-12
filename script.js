function confirmerSuppressionAp(id) {
  if (confirm("Êtes-vous sûr de vouloir supprimer cet apprenant ?")) {
      window.location.href = "delete-apprenant.php?id=" + id;
  }
}
  
function confirmerModifAp() {
    if (window.confirm("Êtes-vous sûr de vouloir modifier l'apprenant ?")) {
        return true;
    } else {
        return false;
    }
}

function confirmerSuppressionAd(id) {
    if (confirm("Êtes-vous sûr de vouloir supprimer cet admin ?")) {
        window.location.href = "delete-admin.php?id=" + id;
    }
  }

  function confirmerModifAd() {
    if (window.confirm("Êtes-vous sûr de vouloir modifier l'admin ?")) {
        return true;
    } else {
        return false;
    }
}