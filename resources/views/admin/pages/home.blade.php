@extends('admin.layouts.main')
@section('title')
    Tableau de bord
@endsection
@section('bigTitle')
    Tableau de bord
@endsection
@section('pageName')
    Tableau de bord
@endsection

@section('main')
    <div class="container">
        @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ $message }}
        </div>
    @endif
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ $message }}
        </div>
    @endif
    </div>
    <div class="row">

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>44</h3>

                    <p>Utilisateurs</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">Voir plus <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>15</h3>

                    <p>Pages</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">voir plus <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>23</h3>

                    <p>Articles</p>
                </div>
                <div class="icon">
                    <i class="ion ion-ios-paper"></i>
                </div>
                <a href="#" class="small-box-footer">Voir plus<i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>65</h3>

                    <p>Visiteurs</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">Voir plus <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->
    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <section class="col-12 connectedSortable">
            <div class="col-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Liste de messages</h3>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="mailbox-controls">
                            <div class="float-right">
                                {{$contacts->links()}}
                                <!-- /.btn-group -->
                            </div>
                            <!-- /.float-right -->
                        </div>
                        <div class="table-responsive mailbox-messages">
                            <table class="table table-hover table-striped">
                                <tbody>
                                    @foreach ($contacts as $contact)
                                    <tr>
                                        <td>{{ $contact->name }}</td>
                                        <td>{{ $contact->email }}</td>
                                        <td>{{ $contact->phone }}</td>
                                        <td>{{ $contact->subject }}</td>
                                        <td>
                                            <a class="btn btn-info" href="{{ route('contacts.show', $contact->id) }}">
                                                <i class="fas fa-eye"></i>
                                                Voir
                                            </a>
                                        </td>
                                        <td>
                                            <button class="btn btn-danger" data-toggle="modal" data-target="#delete__{{ $contact->id }}">
                                                <i class="fas fa-trash"></i>
                                                Supprimer
                                            </button>
                                            <div class="modal fade" id="delete__{{ $contact->id }}" aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h4 class="modal-title">Suppression de message</h4>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                      </button>
                                                    </div>
                                                    <form action="{{ route('contacts.destroy', $contact->id) }}" method="post">
                                                    <div class="modal-body">
                                                      @csrf
                                                      @method('DELETE')
                                                      <div class="text-danger">
                                                        <h1>Attention!</h1>
                                                        <p>Vous êtes sur le point de supprimer le message sur le sujet <strong>{{ $contact->subject }}</strong>. Voulez-vous procéder à la suppression?
                                                      </div>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                      <button type="button" class="btn btn-default" data-dismiss="modal">Non</button>
                                                      <button type="submit" class="btn btn-danger modal_form_submit_btn">Oui</button>
                                                    </div>
                                                  </div>
                                                </form>
                                                  <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                              </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- /.table -->
                        </div>
                        <!-- /.mail-box-messages -->
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </section>
        <!-- right col -->
    </div>
@endsection

@section('additional_script')
    <script>
        $(function() {
            //Enable check and uncheck all functionality
            $('.checkbox-toggle').click(function() {
                var clicks = $(this).data('clicks')
                if (clicks) {
                    //Uncheck all checkboxes
                    $('.mailbox-messages input[type=\'checkbox\']').prop('checked', false)
                    $('.checkbox-toggle .far.fa-check-square').removeClass('fa-check-square').addClass(
                        'fa-square')
                } else {
                    //Check all checkboxes
                    $('.mailbox-messages input[type=\'checkbox\']').prop('checked', true)
                    $('.checkbox-toggle .far.fa-square').removeClass('fa-square').addClass(
                        'fa-check-square')
                }
                $(this).data('clicks', !clicks)
            })

            //Handle starring for font awesome
            $('.mailbox-star').click(function(e) {
                e.preventDefault()
                //detect type
                var $this = $(this).find('a > i')
                var fa = $this.hasClass('fa')

                //Switch states
                if (fa) {
                    $this.toggleClass('fa-star')
                    $this.toggleClass('fa-star-o')
                }
            })
        })
    </script>
@endsection
