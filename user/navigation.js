

function loading(){
	$(".container").html('<center><img src="img/loading.gif"/><i> loading page ...</i></center>');
	 $(".container").hide();
	 $(".container").fadeIn("slow");
};
// function Loadevent(){loading();$(".tampil").load('eavailable.php');};
// function Load(){
//     alert('halo');
//     $('#modal-loading').modal('show');
//     $.ajax({
//       type: 'GET'
//       url: 'eavailable.php',
//       success: function(response){
//         $(".tampil").html(response);
//         $('#modal-loading').modal('hide');
//       }
//     })
// }
function Loadevent(offset=1){
	
                $('#modal-loading').modal('show');
                offset = (offset-1) * 50
                $.ajax({
                    method: 'post',
                    url: '<?php echo base_url() ?>eavailable.php',
                    data: {'offset': 'nilai'},
                    success: function(data){
                    	console.log("terlaksana");
                    	alert('tes');
                        $('#modal-loading').modal('hide');
                        $('.tampil').html(data);
                        $('#ajax_pagination li a').attr('href', '#!');
                        $('#ajax_pagination li a').on('click', function(){
                            var offset = $(this).attr('data-ci-pagination-page');
                            Loadevent(offset);
                        });
                    },

                    error: function(XMLHttpRequest){
                        alert(XMLHttpRequest.responseText);
                    }
                });
            }
// function Loadevent(){loading();$(".content-wrapper").load('eavailable.php');};
function Loadterlaksana(){loading();$(".tampil").load('terlaksana.php');};
function Loadpeserta(){loading();$(".tampil").load('peserta.php');};
function Loadsarana(){loading();$(".tampil").load('saraavailable.php');};
function Loadbooking(){loading();$(".tampil").load('booking.php');};
function Loadvalidation(){loading();$(".tampil").load('validation.php');};
function Loadinbox(){loading();$(".tampil").load('inbox.php');};
function Loadsent(){loading();$(".tampil").load('sent.php');};

// var xhr = new XMLHttpRequest();
// var tersedia = document.getElementsByClassName("tersedia");
// var terlaksana = document.getElementsByClassName("terlaksana");
// var tampil = document.getElementsByClassName("tampil");
// console.log();

// function loading(){
// 	$(".tampil").hide();
// 	$(".container").fadeIn("slow");
// };

// function Loadevent(){
// 	xhr.open('GET', 'eavailable.php', true);
// 	xhr.onload = function(){
// 		tampil[0].innerHTML = xhr.response;
// 	}
// 	xhr.send();
// }

// function Loadterlaksana(){
// 	xhr.open('GET', 'terlaksana.php', true);
// 	xhr.onload = function(){
// 		tampil[0].innerHTML = xhr.response;
// 	}
// 	xhr.send();
// }
