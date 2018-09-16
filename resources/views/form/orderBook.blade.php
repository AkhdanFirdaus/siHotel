<div class="card">
    <div class="container p-5"> 
      <div class="row">                  
        <div class="col-md-6">          
          <div class="form-group">
            {{ Form::label('checkin', 'Check-in') }}
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="far fa-calendar-alt"></i></span>
              </div>
              {{ Form::date('checkin', $detail['checkin'], ['class' => 'form-control', 'required' => 'required']) }}
            </div>          
          </div>

          <div class="form-group">
            {{ Form::label('checkout', 'Check-out') }}
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="far fa-calendar-alt"></i></span>
              </div>      
              {{ Form::date('checkout', $detail['checkout'], ['class' => 'form-control', 'required' => 'required']) }}
            </div>          
          </div>        

          <div class="form-group">
            {{ Form::label('jml', 'Jumlah Tamu') }}
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-user-friends"></i></span>
              </div>      
              {{ Form::number('jml', $detail['jml'], ['class' => 'form-control']) }}
            </div>          
          </div>
        </div>

        <div class="col-md-6">
          @if(!Auth::check())
            <div class="form-row">
              <div class="col form-group">
                {{ Form::label('nama', 'Nama') }}
                {{ Form::text('nama',  old('nama'), ['class' => 'form-control', 'required' => 'required']) }}
              </div>
            </div>
            
              <div class="form-group">
                {{ Form::label('email', 'Email') }}
                {{ Form::text('email', old('email'), ['class' => 'form-control', 'required' => 'required']) }}
              </div>

              <div class="form-group">
                {{ Form::label('alamat', 'Alamat') }}
                {{ Form::textarea('alamat', old('alamat'), ['class' => 'form-control', 'required' => 'required']) }}
              </div>


            <div class="form-row">
              {{ Form::reset('Batal', ['class' => 'btn btn-danger'])}}
              {{ Form::submit('Pesan', ['class' => 'btn btn-primary'])}}
            </div>
          @endif
        </div>

      </div>
    </div>
</div>