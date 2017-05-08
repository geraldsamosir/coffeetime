@extends('layouts.frontend')

@section('title', 'Panel Akun')

@section('content')
	<div class="section-panel">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					{{-- Sidepanel from components --}}
					@include('frontend.components.sidepanel')
				</div>
				<div class="col-md-8">
					<div class="section-panel-informasi">
						<div class="panel-card">
							<div class="panel-card-header">
								<h3 class="panel-title">Buat Resep</h3>
							</div>
							{!! Form::open(['url'=>'']) !!}
							<div class="panel-card-body">

								<div class="form-group">
									{!! Form::label('lblJudul',"Judul Resep",['class'=>'required']) !!}
									{!! Form::text('lblJudul',null,['class'=>'form-control','required']) !!}
								</div>

                <div class="form-group">
									{!! Form::label('lblCategory',"Category Resep",['class'=>'required']) !!}
									<select class="brew-select form-control">
                    <option value="DR">DRIP</option>
                    <option value="ES">ESPRESSO</option>
                    <option value="AE">AEROPRESS</option>
                    <option value="WB">WHOLEBEAN</option>
                  </select>
								</div>
								
								<div class="form-group">
									{!! Form::label('lblDeskripsi',"Deskripsi",['class'=>'required']) !!}
									{!! Form::textarea('lblDeskripsi',null,['class'=>'form-control ckeditor','required','rows'=>'7']) !!}
								</div>

								<div class="form-group">
									{!! Form::label('lblBahan',"Bahan",['class'=>'required']) !!}
									{!! Form::textarea('lblBahan',null,['class'=>'form-control ckeditor','required','rows'=>'3']) !!}
								</div>

								<div class="form-group">
									{!! Form::label('lblAlat',"Alat",['class'=>'required']) !!}
									{!! Form::textarea('lblAlat',null,['class'=>'form-control ckeditor','required','rows'=>'3']) !!}
								</div>

								<div class="form-group">
									{!! Form::label('lblCara',"Cara",['class'=>'required']) !!}
									{!! Form::textarea('lblCara',null,['class'=>'form-control ckeditor','required','rows'=>'5']) !!}
								</div>
								
								<a href="/customer/panelResep" class="btn btn-tohome">Batal</a>
								{!! Form::submit('Simpan',['class'=>'btn btn-primary']) !!}
							</div>
							{!! Form::close() !!}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection