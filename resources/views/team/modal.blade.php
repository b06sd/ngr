<div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <i class="fa fa-users modal-icon"></i>
                <h4 class="modal-title">Create Team</h4>
                <small class="font-bold">Team for specific unit and particular upload.</small>
            </div>
            <form action="{{ route('team.store') }}">            
            <div class="modal-body">
                    <div class="form-group">
                         <input type="name" placeholder="Enter your name" class="form-control">
                         <br>
                         <input type="name" placeholder="Enter your display team name" class="form-control">
                         <br>
                         <input type="name" placeholder="Enter your teams description" class="form-control">                         
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                <button type="submit" value="Submit" id="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>