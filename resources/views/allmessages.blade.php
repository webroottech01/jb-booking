@extends('layouts.master')
@section('content')
    <link href="https://hostdev2.justboardrooms.com/css/boardrooms_chat.css" rel="stylesheet">
    <style>
        .inbox-wrapper .inbox-left-wrapper .left-msg .chatReadStatus-0 {
            border: 1px solid darkgreen !important;
        }
    </style>
    @php
    $listId = isset($_GET['listId']) ? $_GET['listId'] : '';
    $receiverId = isset($_GET['receiverId']) ? $_GET['receiverId'] : '';
    @endphp


    <div class="chat-inbox">
        <div class="container">
            <div class="inbox-wrapper py-5">
                <div class="row">
                    <div class="col-md-3">
                        <div class="inbox-left-wrapper">
                            <div class="left-header">
                                <select class="form-control form-select" style="margin-bottom: 3px;" id="inbox-filter">
                                    <option value="all_msg">All message</option>
                                    <option value="unread">Unread</option>
                                    {{-- @foreach ($boardRooms as $k => $val)
                                <option value="{{ $k }}" @if ($listId == $k) selected @endif>{{ $val}}</option>
                                @endforeach --}}

                                </select>
                            </div>
                            <div class="left-msg">
                                @foreach ($all_chat as $k => $chat)
                                    @php
                                        $bdName = strtolower(str_replace(' ', '-', $chat['boardroomName']));
                                    @endphp
                                    <div class="msg-contact-unique myID-{{ $chat['myId'] }} receiverID-{{ $chat['creatorId'] }} chatId-{{ $chat['chat_id'] }} chat-br-{{ $chat['boardroomId'] }} chat-br-{{ $bdName }} chatReadStatus-{{ $chat['readCheck'] }} userType-{{ $chat['user_type'] }} chatArchived-{{ $chat['archived'] }}@if ($chat['creatorId'] == $receiverId) active @endif "
                                        style="display: block;">
                                        <div class="chatId chatid" style="display: none;">{{ $chat['chat_id'] }}</div>
                                        <div class="receiverId" style="display: none;">{{ $chat['creatorId'] }}</div>
                                        <div class="lastmsgId" style="display: none;">{{ $chat['lastMsgId'] }}</div>
                                        @if ($chat['creatorPic'])
                                            <div class="user-pic img"><img src="/profile/{{ $chat['creatorPic'] }}">
                                            </div>
                                        @else
                                            <div class="user-pic">
                                                <div class="initials">{{ $chat['creatorInitial'] }}</div>
                                            </div>
                                        @endif
                                        <div class="contact-data">
                                            <div class="contact-upr">{{ $chat['chat_name'] }}</div>
                                            <div class="contact-btm">
                                                <div class="boardroom-name" data-toggle="tooltip" data-placement="top"
                                                    title="{{ $chat['boardroomName'] }}">{{ $chat['boardroomName'] }}
                                                </div>
                                                <div class="boardroom-date">{{ $chat['date'] }}</div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @if (count($all_chat) > 0)
                        <div class="col-md-9">

                            <div class="inbox-right-wrapper">
                                <div class="chat-json-wrapper-top mb-20">
                                    <div class="chat-json-wrapper ">
                                       
                                        
                                    </div>
                                </div>
    
                                <div class="inbox-send-chat-wrapper"
                                    @if ($receiverId == null) {{ 'style=display:none' }} @endif>
                                    <div class="alert alert-danger" id="index-error-bag" style="display: none;">
                                        <ul id="index-msg-errors"></ul>
                                    </div>
                                    <form id="sendComment" class="mt-20">
                                        <textarea id="chat-message" rows="3" name="chat-msg"> </textarea>
                                        <button type="submit" class="btn btn-secondary btnSubmit">Send</button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    @else
                        <div class="col-md-9 row d-flex justify-content-center">
                            <div class="col-md-6" style="
                            margin-top: 12rem;
                            margin-left: 0rem;font-size:33px;color:#d9d8d6;">

                                You have no messages
                                
                            </div><img style="width: 9%;
                            height: initial;
                            position: absolute;
                            top: 27rem;
                            left: 49rem;" src="https://hostdev2.justboardrooms.com/imgs/Emptymailboxicon.jpg" alt="">
                            {{-- <div class="inbox-right-wrapper">
                            <div class="chat-json-wrapper-top mb-20">
                                <div class="chat-json-wrapper ">
                                   
                                    
                                </div>
                            </div>

                            <div class="inbox-send-chat-wrapper"
                                @if ($receiverId == null) {{ 'style=display:none' }} @endif>
                                <div class="alert alert-danger" id="index-error-bag" style="display: none;">
                                    <ul id="index-msg-errors"></ul>
                                </div>
                                <form id="sendComment" class="mt-20">
                                    <textarea id="chat-message" rows="3" name="chat-msg"> </textarea>
                                    <button type="submit" class="btn btn-secondary btnSubmit">Send</button>
                                </form>
                            </div>
                        </div> --}}

                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {


            var url = new URL(window.location.href);
            var lisitingId = url.searchParams.get("listing_id");
            var receiverId = url.searchParams.get("receiver_id");

            if (lisitingId != '') {


                setTimeout(function() {

                    $('body .myID-' + receiverId + '.chat-br-' + lisitingId).click();

                }, 500)


                console.log('.myID-' + receiverId + '.chat-br-' + lisitingId);
            }


            $('.msg-contact-unique').click(function(e) {
                var chatId = $(this).find('.chatId').html();
                loadChatConversation(chatId);

                var chatId = $(this).attr("class").split(' ')[3].split('-')[1]; // ChatId ID
                var myId = $(this).attr("class").split(' ')[1].split('-')[1]; // owner ID

                //msg read/unread
                $(this).removeClass('chatReadStatus-0');
                $(this).addClass('chatReadStatus-1');

                msgreadstatus(chatId, myId);
            });

            $("#sendComment").on('submit', (function(e) {
                e.preventDefault();
                ajaxCallSaveChat();
                console.log("SUBMIT");
                var scrollHieght = $('.chat-wrapper').prop("scrollHeight");
                scrollHieght = scrollHieght * 2;

                setTimeout(function() {
                    $('.chat-wrapper').scrollTop(scrollHieght);
                }, 1000);



            }));

            setInterval(function() {
                //code goes here that will be run every 5 seconds.
                var chatId = $(".inbox-left-wrapper").find('.active').find('.chatId').html();
                var lastmsgId = $(".inbox-left-wrapper").find('.active').find('.lastmsgId').html();

                if (chatId) {
                    ajaxloadchatpartial(chatId, lastmsgId);
                }
            }, 3000);

        });

        function ajaxCallSaveChat() {
            // var cookieValue = document.cookie.replace(/(?:(?:^|.*;\s*)access_token\s*\=\s*([^;]*).*$)|^.*$/, "$1");
            var headers = {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
            var chatId = $(".inbox-left-wrapper").find('.active').find('.chatId').html();
            var receiverId = $(".inbox-left-wrapper").find('.active').find('.receiverId').html();

            $.ajax({
                url: "/booking/public/saveMessage",
                type: "POST",
                headers: headers,
                data: {
                    coversationId: chatId,
                    receiverId: receiverId,
                    message: $('#chat-message').val()
                },
                dataType: 'json',
                crossDomain: true,
                timeout: 86400,
                success: function(data) {
                    var lastmsgIdold = $(".inbox-left-wrapper").find('.active').find('.lastmsgId').text();
                    $(".inbox-left-wrapper").find('.active').find('.lastmsgId').text(data.lastMsgId);

                    // need to update last msg ID into the active tab of chat (left side)
                    $('#chat-message').val('');
                    ajaxloadchatpartial(chatId, lastmsgIdold);
                    $("#index-error-bag").hide();
                },
                error: function(data) {
                    var errors = $.parseJSON(data.responseText);
                    console.log(errors.error);
                    $('#index-msg-errors').html('');
                    $.each(errors.error, function(key, value) {
                        console.log(value);
                        $('#index-msg-errors').append('<li>' + value + '</li>');
                    });
                    $("#index-error-bag").show();

                }
            });
        }

        function ajaxloadchatpartial(chatId, lastmsgIdold) {
            // var cookieValue = document.cookie.replace(/(?:(?:^|.*;\s*)access_token\s*\=\s*([^;]*).*$)|^.*$/, "$1");
            var headers = {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }

            $.ajax({
                url: '/booking/public/getMessagepartial',
                type: 'POST',
                headers: headers,
                data: {
                    chatId: chatId,
                    lastmsgIdold: lastmsgIdold,
                },
                dataType: 'json',
                crossDomain: true,
                timeout: 86400,
                success: function(data) {

                    if (data.data == '') {

                    } else {
                        jQuery('.inbox-right-wrapper').find('.chat-wrapper').append(data.data);
                        $(".inbox-left-wrapper").find('.active').find('.lastmsgId').html(data.lastmsgId);
                    }

                },
                error: function(data) {

                }
            });
        }

        function loadChatConversation(chatId = null) {
            $(".msg-contact-unique").removeClass('active');
            $('.chatId-' + chatId).addClass('active');

            // var cookieValue = document.cookie.replace(/(?:(?:^|.*;\s*)access_token\s*\=\s*([^;]*).*$)|^.*$/, "$1");
            var headers = {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
            $.ajax({
                url: '/booking/public/getSingleChat',
                type: 'POST',
                headers: headers,
                data: {
                    chat_id: chatId,
                },
                dataType: 'json',
                crossDomain: true,
                timeout: 86400,
                success: function(data) {
                    if (data.data == '') {
                        $('.chat-json-wrapper-top').find('.chat-wrapper').html('');

                        $('.inbox-send-chat-wrapper').show();
                    } else {
                        if (data.firstConversation == true) {
                            //$('#note-payment').modal('show');
                        }

                        $('.chat-json-wrapper-top').html(data.data);
                        $('.inbox-send-chat-wrapper').show();
                    }

                },
                error: function(data) {

                }
            });
        }

        function msgreadstatus(chatId, myId) {
            // var cookieValue = document.cookie.replace(/(?:(?:^|.*;\s*)access_token\s*\=\s*([^;]*).*$)|^.*$/, "$1");
            var headers = {
                /* "Access-Control-Allow-Origin": "*",
                'Authorization': `Bearer ${cookieValue}`, */
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
            $.ajax({
                url: '/booking/public/readMessage',
                type: 'POST',
                headers: headers,
                data: {
                    chat_id: chatId,
                    myId: myId
                },
                dataType: 'json',
                crossDomain: true,
                timeout: 86400,
                success: function(data) {

                },
                error: function(data) {

                }
            });
        }
    </script>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
@endsection
