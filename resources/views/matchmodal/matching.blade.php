<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="/css/main.css" />


<!-- Bootstrap JavaScript and dependencies -->

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>


<style>
    /* Add this style to remove the dim */
    .modal-backdrop {
        display: none;
    }

    .btn-group{
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-bottom: 80px;
        
    }

    .btn-square {
        border-radius: 0;
    }
   
    .dropdown-menu .dropdown-menu-end{
        max-height: 5px;
        z-index: 1000;
        overflow-y: scroll;
    }
   
    
   
</style>

<div class="modal fade" id="matchingModal" tabindex="-1" role="dialog" aria-labelledby="matchingModalTitle" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="matchingModalTitle">Interests</h3>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('startmatching') }}" method="post" id="yourFormId1">
                @csrf
                <div class="modal-body">
                    <!-- Checkbox Section -->
                    <div class="btn-group m-auto" role="group" aria-label="Basic checkbox toggle button group">
                        <input type="checkbox" class="btn-check" id="btncheck1" name="interest[]" value="League of Legends" autocomplete="off">
                        <label class="btn btn-outline-primary mb-2 btn-square" for="btncheck1" style="width: 200px;">League of Legends</label>
    
                        <input type="checkbox" class="btn-check" id="btncheck2" name="interest[]"  value="Valorant" autocomplete="off">
                        <label class="btn btn-outline-primary mb-2 btn-square" for="btncheck2" style="width: 200px;">Valorant</label>
    
                        <input type="checkbox" class="btn-check" id="btncheck3" name="interest[]"  value="Genshin Impact" autocomplete="off">
                        <label class="btn btn-outline-primary mb-2 btn-square" for="btncheck3" style="width: 200px;">Genshin Impact</label>
    
                        <input type="checkbox" class="btn-check" id="btncheck4" name="interest[]"  value="Mobile Legends" autocomplete="off">
                        <label class="btn btn-outline-primary mb-2 btn-square" for="btncheck4" style="width: 200px;">Mobile Legends</label>
    
                        <input type="checkbox" class="btn-check" id="btncheck5" name="interest[]"  value="Call of Duty" autocomplete="off">
                        <label class="btn btn-outline-primary mb-2 btn-square" for="btncheck5" style="width: 200px;">Call of duty Mobile</label>

                   
                    </div>

                    <h5 class="GenderTitle" style="position: relative; margin-top: 1%; margin-bottom: 5%;">gender:</h5>
    
                        <!-- GENDER CHOICES -->
                        <div class="btn-group m-auto" role="group" aria-label="Basic radio button group" style="margin-top: 10%">
                            <input type="radio" class="btn-check" id="btncheckMen" name="gender" value="male" autocomplete="off">
                            <label class="btn btn-outline-primary mb-2 btn-square" for="btncheckMen" style="width: 200px; position: relative; right: 25%;">Male</label>
    
                            <input type="radio" class="btn-check" id="btncheckWomen" name="gender" value="female" autocomplete="off">
                            <label class="btn btn-outline-primary mb-2 btn-square" for="btncheckWomen" style="width: 200px; position: absolute; top: 0%; right: 2%;">Female</label>
    
                            <input type="radio" class="btn-check" id="btncheckOthers" name="gender" value="others" autocomplete="off">
                            <label class="btn btn-outline-primary mb-2 btn-square" for="btncheckOthers" style="width: 200px;">Others</label>
                        </div>
    
                        <!-- AGE TITLE -->
                        <div class="AgeTitle" style="font-size: 10%; position: relative; margin-top: 10%;">
                           <!-- <h5>pick age: <span id="ageValue">18</span></h5>-->
                        </div>
    
                        <div class="form-outline mb-4">
                            <x-input-label for="age" :value="__('age')" />
                            <x-text-input id="age" class="form-control mt-1 w-full" type="number"
                                name="age" :value="old('age')" required autofocus
                                autocomplete="age" />
                            <x-input-error :messages="$errors->get('age')" class="mt-2" />
                        </div>
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                       
                    </div>
            </form>
        </div>
    </div>
</div>
   
