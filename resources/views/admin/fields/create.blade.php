@extends('layouts.admin')

@section('content')
    {{--{{dd($books)}}--}}
    <button
            type="button"
            class="btn btn-primary btn-lg"
            data-toggle="modal"
            data-target="#favoritesModal">
        Add to Favorites
    </button>

    <div class="modal fade" id="favoritesModal"
         tabindex="-1" role="dialog"
         aria-labelledby="favoritesModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close"
                            data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"
                        id="favoritesModalLabel">The Sun Also Rises</h4>
                </div>
                <div class="modal-body">
                    <p>
                        Please confirm you would like to add
                        <b><span id="fav-title">The Sun Also Rises</span></b>
                        to your favorites list.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button"
                            class="btn btn-default"
                            data-dismiss="modal">Close</button>
                    <span class="pull-right">
          <button type="button" class="btn btn-primary">
            Add to Favorites
          </button>
        </span>
                    {{--<script type="text/javascript" >--}}
                        {{--$('.chosen-select' ).chosen()--}}

                        {{--$(function() {--}}
                            {{--$('#favoritesModal').on("show.bs.modal", function (e) {--}}
{{--//                $("#favoritesModalLabel").html($(e.relatedTarget).data('title'));--}}
{{--//                $("#fav-title").html($(e.relatedTarget).data('title'));--}}
                                {{--$("#favoritesModalLabel").html("lable KHar AST");--}}
                                {{--$("#fav-title").html("Title khar ast");--}}
                            {{--});--}}
                        {{--});--}}
                    {{--</script>--}}
                </div>
            </div>
        </div>
    </div>

    @foreach ($books as $book)
        <button
                type="button"
                class="btn btn-primary btn-lg"
                data-toggle="modal"
                data-id=""
                data-title=""
                data-target="#favoritesModal">
            Add to Favorites
        </button>
    @endforeach

    <script src="http://localhost/rca/bower_components/jquery/dist/jquery.min.js" type="text/javascript"></script>
    <script src="http://localhost/rca/bower_components/chosen/chosen.jquery.js" type="text/javascript"></script>
    <script type="text/javascript" >
        $('.chosen-select' ).chosen()

        $(function() {
            $('#favoritesModal').on("show.bs.modal", function (e) {
                $("#favoritesModalLabel").html($(e.relatedTarget).data('title'));
                $("#fav-title").html($(e.relatedTarget).data('title'));
//
//
            });
        });
    </script>
@stop
