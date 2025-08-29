<div class="modal fade" id="rapportModal{{ $rapport->id }}" tabindex="-1" aria-labelledby="rapportModalLabel{{ $rapport->id }}" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Détail du Rapport #{{ $rapport->id }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body">
        <ul class="list-group">
          <li class="list-group-item"><strong>Date :</strong> {{ $rapport->date }}</li>
          <li class="list-group-item"><strong>Activité de Groupe :</strong> {{ $rapport->activiteGroup }}</li>
          <li class="list-group-item"><strong>Remarque faites:</strong> {{ $rapport->remarque }}</li>
          <li class="list-group-item"><strong>Présences :</strong> {{ $rapport->nbPres }}</li>
          <li class="list-group-item"><strong>Visite :</strong> {{ $rapport->visite }}</li>
          <li class="list-group-item"><strong>Observation faites :</strong> {{ $rapport->observationFait }}</li>
          <li class="list-group-item"><strong>Kits :</strong> {{ $rapport->kits }}</li>
          <li class="list-group-item"><strong>Nouveaux Enregs :</strong> {{ $rapport->nouvelEnreg }}</li>
          <li class="list-group-item"><strong>Départs :</strong> {{ $rapport->depart }}</li>
          <li class="list-group-item"><strong>Transferts :</strong> {{ $rapport->transfert }}</li>
          <li class="list-group-item"><strong>Vaccinations :</strong> {{ $rapport->vaccination }}</li>
          <li class="list-group-item"><strong>Maladie :</strong> {{ $rapport->casMaladie }}</li>
          <li class="list-group-item"><strong>Commentaire Maladie :</strong> {{ $rapport->commentMaladie }}</li>
          <li class="list-group-item"><strong>Superviseur :</strong> {{ $rapport->superviseur }}</li>
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>
