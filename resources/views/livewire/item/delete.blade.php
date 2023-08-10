<div>
   <div class="modal fade" id="modalDelete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
      aria-labelledby="modalDelete" aria-hidden="true" wire:ignore.self>
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <p>Yakin ingin menghapus?</p>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                  Tutup
               </button>
               <button type="button" class="btn btn-primary" wire:click="deleteItem">
                  Ya
               </button>
            </div>
         </div>
      </div>
   </div>
</div>