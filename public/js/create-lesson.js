$(document).ready(function(){
	i = 0;

	
	$(document).on('click', '.btn-remove', function(){
		idDiv = $(this).val();
		$("#"+idDiv).remove();

	});


	$(document).on('click', '#btn-add-question', function(){
	    $('#question-list').append(
	    	'<div class="ui form secondary segment" id="question-'+i+'">\
	    		<div class="two fields">\
		    	 	<div class="required field">\
		    	 		<input type="text" placeholder="Pertanyaan" name="question['+i+']">\
		    	 	</div>\
		    	 	<div class="required field">\
		    	 		<div class="inline fields">\
		 				    <label for="question_type_id">Pilih jenis Soal:</label>\
		    				<div class="field">\
		      					<div class="ui radio checkbox">\
		        					<input data-id="'+i+'" type="radio" class="quiz-type-radio" name="question_type_id['+i+']" checked="" value="1" >\
		       						<label>Essay</label>\
		      					</div>\
							</div>\
							<div class="field">\
		      					<div class="ui radio checkbox">\
		        					<input data-id="'+i+'" type="radio" class="quiz-type-radio" name="question_type_id['+i+']" value="2" >\
		       						<label>Pilihan Ganda</label>\
		      					</div>\
							</div>\
						</div>\
		    	 	</div>\
		    	 	<button type="button"  value="question-'+i+'" class="circular ui icon button btn-remove">\
  						<i class="icon trash"></i>\
					</button>\
	    	 	</div>\
	    	 	<div id="panel-'+i+'">\
	    	 		<div class="required field">\
		    	 		<input type="text" placeholder="Jawaban" name="answer['+i+']">\
	    	 		</div>\
	    	 	</div>\
	    	</div>'    	
	    );	    
		i++;
	});

	$(document).on('change', '.quiz-type-radio', function(){
	   idQuestion = $(this).attr("data-id"); 
	   id = "#panel-" + idQuestion;
	   if($(this).val() == 1){
	   		$(id).html('\
	   			<div class="required field">\
		    	 		<input type="text" placeholder="Jawaban" name="answer['+idQuestion+']">\
	    	 		</div>\
	   			');
	   }else{
	   		j =  2 ;
	   		$(id).html('\
	   				<div id="pilhan-ganda-'+idQuestion+'"  data-jumlah-pilihan="'+j+'">\
						<button data-id-question="'+idQuestion+'" type="button" style="margin-bottom:5px"  class="ui left attached button btn-add-choiches">Tambah</button>\
						<button data-id-question="'+idQuestion+'" type="button"  class="right attached ui button btn-remove-choiches">Kurang</button>\
		   				<div class="required field">\
			    	 		<input type="text" placeholder="Pilihan 1" name="text[]">\
			    	 		<input type="hidden" name="question_id[]" value="'+idQuestion+'"></input> \
		    	 		</div>\
		    	 		<div class="required field">\
			    	 		<input type="text" placeholder="Pilihan 2" name="text[]">\
			    	 		<input type="hidden" name="question_id[]" value="'+idQuestion+'"></input> \
		    	 		</div>\
	    	 		</div>\
	    	 		<div class="field" style="margin-top:5px;">\
	    	 			Pilih Jawaban :\
			    	 	<select id="answer-'+idQuestion+'" class="ui search dropdown" name="answer['+idQuestion+']>\
							<option value="1">Pilihan 1</option>\
							<option value="1">Pilihan 1</option>\
							<option value="2">Pilihan 2</option>\
			    	 	</select>\
		    	 	</div>\
	   			');
	   }
	});

	$(document).on('click', '.btn-add-choiches', function(){
		idQuestion = $(this).attr("data-id-question"); 		
		jumlahPilihan = parseInt($("#pilhan-ganda-"+idQuestion).attr("data-jumlah-pilihan")); 
		$('#pilhan-ganda-'+idQuestion).append(
			'<div class="required field">\
			 	<input type="text" placeholder="Pilihan '+(jumlahPilihan+1)+'" name="text[]">\
		   		<input type="hidden" name="question_id[]" value="'+idQuestion+'"></input> \
		    </div>'
		);
		
		$('#answer-'+idQuestion).append(
			'<option value="'+(jumlahPilihan+1)+'">Pilihan '+(jumlahPilihan+1)+'</option>'
		);
		$("#pilhan-ganda-"+idQuestion).attr("data-jumlah-pilihan",jumlahPilihan+1); 
	});

	$(document).on('click', '.btn-remove-choiches', function(){
		idQuestion = $(this).attr("data-id-question"); 		
		jumlahPilihan = parseInt($("#pilhan-ganda-"+idQuestion).attr("data-jumlah-pilihan")); 
		
		if(jumlahPilihan > 2){
			$('#pilhan-ganda-'+idQuestion).children().last().remove();
			$('#answer-'+idQuestion).children().last().remove();
			$("#pilhan-ganda-"+idQuestion).attr("data-jumlah-pilihan",jumlahPilihan-1); 
		}
	});

	//video content
	$(document).on('change', '.btn-video-content', function(){

		if($(this).val() == 1){
			content = '<div class="required field">\
			 	<input type="text" placeholder="youtube video id" name="video_id">\
		    </div>';

		}else{
			content = '<div class="required field">\
				<label>Upload Video</label>\
				<input type="file" name="video" />\
			</div>';
		}

		$("#video-content").html(content);
	});

	
});




