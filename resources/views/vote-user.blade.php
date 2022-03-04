<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Voting</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/vote-user.css">
</head>

<body>

    <div class="container-fluid p-0">
        <div class="row vh-100">
            <div class="col-sm-2">
                <img src="img/auth/batik_cokelat.png" class="d-none d-sm-block batik h-100" style="" alt="">
            </div>
            <div class="col d-flex justify-content-center">
                @livewire('vote-user')
            </div>
            <div class="col-sm-3 d-flex mt-auto">
                <img class="d-none d-sm-block" src="img/auth/epik.png" style="width: 100%" alt="">
            </div>
            
        </div>
        
    </div>

    {{-- success vote modal --}}

<!--Model Popup starts-->
<div class="container">
    <div class="row">
        <div class="modal fade" id="ignismyModal" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>
					
                    <div class="modal-body">
                       
						<div class="thank-you-pop">
							<img src="" alt="">
							<h1></h1>
							<p></p>
							
 						</div>
                         
                    </div>
					
                </div>
            </div>
        </div>
    </div>
</div>
<!--Model Popup ends-->

{{-- CONFIRMATION MODAL --}}

  <!-- Modal -->
  <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div style="background-color: #F7F3F0" class="modal-content">
        <div style="background-color: #9C8357" class="modal-header">
          <h5 class="modal-title text-white" id="exampleModalLabel">Konfirmasi</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center">
          Apakah anda yakin ingin vote? <br> <span class="text-danger">Anda tidak akan bisa vote lagi di kompetisi ini...</span>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
          <button id="yes-vote" type="button" class="btn btn-success">Iya</button>
        </div>
      </div>
    </div>
  </div>

  @livewireScripts

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
        integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        window.livewire.on('voteSuccess', () => {
            //fill img src
            $('#ignismyModal img').attr('src', 'img/green-tick.png');
            //fill h1 element
            $('#ignismyModal h1').text('Terima Kasih!');
            //fill p element
            $('#ignismyModal p').text('Vote kamu sudah masuk!');
            $('#ignismyModal').modal('show');
        });
        window.livewire.on('voteFailed', () => {
            $('#ignismyModal img').attr('src', 'img/cross.png');
            //fill h1 element
            $('#ignismyModal h1').text('Oops!');
            //fill p element
            $('#ignismyModal p').text('Kamu sudah pernah vote di kompetisi ini!');
            $('#ignismyModal').modal('show');
        });
        window.livewire.on('voteClosed', () => {
            $('#ignismyModal img').attr('src', 'img/cross.png');
            //fill h1 element
            $('#ignismyModal h1').text('Oops!');
            //fill p element
            $('#ignismyModal p').text('Voting ditutup!');
            $('#ignismyModal').modal('show');
        });
        

        window.livewire.on('serverError', () => {
            $('#ignismyModal img').attr('src', 'img/cross.png');
            //fill h1 element
            $('#ignismyModal h1').text('Oops!');
            //fill p element
            $('#ignismyModal p').text('Server Error!');
            $('#ignismyModal').modal('show');
        });
        window.livewire.on('confirmVote', () => {
            
            $('#confirmModal').modal('show');
        });
        $('#yes-vote').click(function(){
            $('#confirmModal').modal('hide');
            //ajax post
            $.ajax({
                url: '/vote',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    idJoin: $('#peserta-lomba').val(),
                    idLomba: $('#nama-lomba').val(),
                },
                success: function(data) {
                    window.livewire.emit('voteSuccess');
                },
                error: function(data) {
                    window.livewire.emit('serverError');
                }
            });
        });
    </script>

</body>

</html>
