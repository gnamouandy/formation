<x-master-layout>
    <div class="container">
        <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <br>
                            
                <h5 class="text-center"> Ajout d'un nouveau produit </h5>
                <br>

                    <form action="{{ route('produit.enregistrer') }}" method="post">
                        @method("POST")
                        @csrf
                        
                            <div class="mb-8 row">
                            <label for="" class="col-sm-1.5 col-form-label">Désignation</label>
                            <div class="col-sm-10">
                            <input type="text"  class="form-control" name="designation" id="" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="">Prix</label>
                            <input type="text" name="prix" id="" class="form-control" placeholder="" aria-describedby="helpId">
                            
                            </div>
                            <div class="form-group">
                            <label for="">Description: </label>
                            <input type="text" name="description" id="" class="form-control" placeholder="" aria-describedby="helpId">
                            <!-- <small id="helpId" class="text-muted">Help text</small> -->
                            </div>
                            <div class="form-group">
                                <label for="">Like</label> 
                                 <input type="number" name="like" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                 <!-- <small id="helpId" class="text-muted">Help text</small> -->
                                </div>
                                <div class="form-group">
                                    <label for="">Poids</label>
                                    <input type="text" name="poids" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                    <!-- <small id="helpId" class="text-muted">Help text</small> -->
                                    </div>
                                    <div class="custom-file mb-5 mt-4">
                                        <input id="image" type="file" name="image" class="custom-file-input">
                                        <label for="image" class="custom-file-label">Image</label>
                                        {{-- @error('image')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror --}}
                                        
                                      </div>
                        <div class="form-group">
                            <label for="">Pays_Source</label>
                            <select class="form-control" name="pays_source" id="">
                            <option value="BF">Burkina Faso</option>
                            <option value="senegal">Sénégal</option>
                            <option value="togo">Togo</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block btn-lg" >Valider</button>
                    </form>
              
            </div>
        </div>
    </div>
        <br>
</x-master-layout>
