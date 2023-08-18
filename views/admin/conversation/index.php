<?php $this->loadView('admin/Layout/header') ?>
<?php $this->loadView('admin/Layout/nav') ?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Hỗ trợ trực tiếp</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Hỗ trợ trực tiếp</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-3">

            <div class="card direct-chat direct-chat-primary">
                <div class="card-header">
                    <h3 class="card-title">Hỗ trợ trực tiếp</h3>
                    <div class="card-tools">
                        <span title="3 New Messages" class="badge badge-warning">New</span>
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" title="Contacts" data-widget="chat-pane-toggle">
                            <i class="fas fa-comments"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>

                <div class="card-body">

                    <div class="direct-chat-messages" id="chat">

                    </div>




                </div>

                <div class="card-footer">

                    <div class="input-group">
                        <input id="input-post" type="text" name="message" placeholder="Type Message ..." class="form-control">
                        <span class="input-group-append">
                            <button type="button" class="btn btn-primary app-chat__post-comment-button">Gửi</button>
                        </span>
                    </div>

                </div>

            </div>

        </div>

        <div class="col-md-9">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Mới</h3>
                    

                </div>

                <div class="card-body p-0">
                    <div class="mailbox-controls">

                        <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
                        </button>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm">
                                <i class="far fa-trash-alt"></i>
                            </button>
                            <button type="button" class="btn btn-default btn-sm">
                                <i class="fas fa-reply"></i>
                            </button>
                            <button type="button" class="btn btn-default btn-sm">
                                <i class="fas fa-share"></i>
                            </button>
                        </div>

                        <button type="button" class="btn btn-default btn-sm">
                            <i class="fas fa-sync-alt"></i>
                        </button>
                        <div class="float-right">
                       
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm">
                                    <i class="fas fa-chevron-left"></i>
                                </button>
                                <button type="button" class="btn btn-default btn-sm">
                                    <i class="fas fa-chevron-right"></i>
                                </button>
                            </div>

                        </div>

                    </div>
                    <div class="table-responsive mailbox-messages">
                        <table class="table table-hover table-striped">
                            <tbody id="show-list-conversation">


                            </tbody>
                        </table>

                    </div>

                </div>

            
            </div>

        </div>


        <div class="col-md-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Gần đây</h3>
                    

                </div>

                <div class="card-body p-0">
                    <div class="mailbox-controls">

                        <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
                        </button>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm">
                                <i class="far fa-trash-alt"></i>
                            </button>
                            <button type="button" class="btn btn-default btn-sm">
                                <i class="fas fa-reply"></i>
                            </button>
                            <button type="button" class="btn btn-default btn-sm">
                                <i class="fas fa-share"></i>
                            </button>
                        </div>

                        <button type="button" class="btn btn-default btn-sm">
                            <i class="fas fa-sync-alt"></i>
                        </button>
                        <div class="float-right">
                            
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm">
                                    <i class="fas fa-chevron-left"></i>
                                </button>
                                <button type="button" class="btn btn-default btn-sm">
                                    <i class="fas fa-chevron-right"></i>
                                </button>
                            </div>

                        </div>

                    </div>
                    <div class="table-responsive mailbox-messages">
                        <table class="table table-hover table-striped">
                            <tbody id="show-list-conversation-admin">


                            </tbody>
                        </table>

                    </div>

                </div>

                
            </div>

        </div>

    </div>

</section>

<script>
    var listOnline = [];
    var globalConversationId = false;
    var content = false;
    var dataAdmin = {
        id: '64a555b9cb4cc0e4383117ae',
        name: 'vu minh hung',
        phone_number: "0539932904",
        email: "vuminhhungltt904@gmail.com"
    };
    let host = "http://localhost:3000/";
    let socket = io.connect(host);
    function checkOnline(id)  {
        
            let exists = Object.values(listOnline).includes((id));
          //  console.log(">" ,listOnline)
            if(exists){
                return `<span id="is-online-${id}" class="right badge badge-success check-online">Trực tuyến</span>`;
            }
            return `<span id="is-online-${id}" class="right badge badge-danger check-online">Ngoại tuyến</span>` ;
      }
    $(document).ready(function() {
        socket.emit('login',{userId: dataAdmin.id});


        $(document).on("keyup paste", "#input-post", function(e) {
            var text = $(this).val();
            if (text !== '') {
                 socket.emit("sendDataClientTypingPrivate", { user_id:  dataAdmin.id,
                 conversation_id : globalConversationId });
            } else {
                socket.emit("sendDataClientTypingPrivate", null);

            }

            if (e.keyCode === 13 && e.shiftKey === false) {
                postComment(text);
            }

        });

        $(document).on("click", ".app-chat__post-comment-button", function(e) {
            postComment($('#input-post').val());
        });

        $(document).on("click", ".reply-single", function(e) {

            $(this).removeClass("btn-danger reply-single");
            $(this).addClass(" btn-success  btn-join");
            $(this).html(`<i class="fa fa-reply" aria-hidden="true"></i>Trả lời`);
            var conversation_id = $(this).attr("data-conversation");
            var objectReply = {
                ...dataAdmin,
                conversation_id: conversation_id
            };
            socket.emit("sendDataClientPrivateReplyByAdmin", objectReply);

            globalConversationId = $(this).attr("data-conversation");
            $('#chat').empty();
            $.ajax({
                    method: "POST",
                    url: `${host}get-chat-private`,
                    data: {
                        id: globalConversationId
                    }
                })
                .done(function(msg) {
                    console.log(msg);
                    msg.map((value, key) => {
                        //console.log(value)
                        if (value.user_id._id == dataAdmin.id) {
                            $('#chat').append(`<div class="direct-chat-msg right">
                                                                    <div class="direct-chat-infos clearfix">
                                                                    <span class="direct-chat-name float-right">(Bạn) ${value.user_id.name}</span>
                                                                    <span class="direct-chat-timestamp float-left">${value.createdAt}</span>
                                                                    </div>

                                                                    <img class="direct-chat-img" src="http://chatsocket.tk/uploaded/user/334346download%20(2).jpeg" alt="message user image">

                                                                    <div class="direct-chat-text">
                                                                     ${value.content}
                                                                    </div>

                                                            </div>`);

                        } else {
                            $('#chat').append(` <div class="direct-chat-msg">
                                                                    <div class="direct-chat-infos clearfix">
                                                                        <span class="direct-chat-name float-left">${value.user_id.name}</span>
                                                                        <span class="direct-chat-timestamp float-right">${value.createdAt}</span>
                                                                    </div>

                                                                  
                                                                    <div class="direct-chat-img text-center bg-secondary pt-2 pb-2"> ${value.user_id.name[(value.user_id.name).lastIndexOf(" ") + 1]}</div>
                                                                    <div class="direct-chat-text">
                                                                    ${value.content}
                                                                    </div>

                                                                </div>`);

                        }

                    })
                })
        });
        $(document).on("click", ".btn-join", function(e) {
            globalConversationId = $(this).attr("data-conversation");
            $('#chat').empty();
            $.ajax({
                    method: "POST",
                    url: `${host}get-chat-private`,
                    data: {
                        id: globalConversationId
                    }
                })
                .done(function(msg) {
                    console.log(msg);
                    msg.map((value, key) => {
                        //console.log(value)
                        if (value.user_id._id == dataAdmin.id) {
                            $('#chat').append(`<div class="direct-chat-msg right">
                                                                    <div class="direct-chat-infos clearfix">
                                                                    <span class="direct-chat-name float-right">(Bạn) ${value.user_id.name}</span>
                                                                    <span class="direct-chat-timestamp float-left">${value.createdAt}</span>
                                                                    </div>

                                                                    <img class="direct-chat-img" src="https://haycafe.vn/wp-content/uploads/2021/12/Anh-thien-nhien-dep-va-tran-ngap-suc-song.jpg" alt="message user image">

                                                                    <div class="direct-chat-text">
                                                                     ${value.content}
                                                                    </div>

                                                            </div>`);

                        } else {
                            $('#chat').append(` <div class="direct-chat-msg">
                                                                    <div class="direct-chat-infos clearfix">
                                                                        <span class="direct-chat-name float-left">${value.user_id.name}</span>
                                                                        <span class="direct-chat-timestamp float-right">${value.createdAt}</span>
                                                                    </div>

                                                                  
                                                                    <div class="direct-chat-img text-center bg-secondary pt-2 pb-2"> ${value.user_id.name[(value.user_id.name).lastIndexOf(" ") + 1]}</div>
                                                                    <div class="direct-chat-text">
                                                                    ${value.content}
                                                                    </div>

                                                                </div>`);

                        }

                    });
                    $("#chat").scrollTop($("#chat")[0].scrollHeight);
                })
        });

        function postComment(value) {
            if (value !== "" && value[0] !== " ") {
                socket.emit("sendDataClientTypingPrivate", null);
                $('#input-post').val("");
               const contentPost = {
                 ...dataAdmin,
                 conversation_id : globalConversationId,
                 content : value
               }
               socket.emit("sendDataClientPrivate", contentPost);
            }

        }
        socket.on("sendDataServerOnline", (item) => {
                listOnline = (item.users);
               // console.log(listOnline);
               $('.check-online').text('Ngoại tuyến');
               $('.check-online').removeClass('badge-success');
               $('.check-online').addClass('badge-danger');

               for(const key in listOnline) {
                    $('#is-online-' + listOnline[key]).text('Trực tuyến');
                    $('#is-online-' + listOnline[key]).addClass('badge-success');
                    $('#is-online-' + listOnline[key]).removeClass('badge-danger');
                    //console.log(`${key}: ${listOnline[key]}`);
                }
                
        });
        socket.on("sendDataServerPrivateAddNewChat", (items) => {
            console.log("sendDataServerPrivateAddNewChat >> ", items);
            content = items.dataMessenger.content;
            $('#' + items.dataMessenger.conversation_id).text(content);
            // chatUser = JSON.parse(localStorage.getItem("user"));
            // if(chatUser.conversation_id == false){
            //     var newObject = {
            //         ...chatUser,
            //         conversation_id: items.dataMessenger.conversation_id
            //     }
            //     localStorage.setItem("user", JSON.stringify(newObject));
            //     renderComment(items.dataMessenger);
            // }
        });
        socket.on("sendDataServerPrivateAddNewChatList", (item) => {

            

            console.log("sendDataServerPrivateAddNewChatList >> ", item);
            $('#show-list-conversation').append(` <tr  >
                                    <td>
                                        <div class="icheck-primary">
                                              <a class="btn btn-danger btn-sm reply-single" data-conversation="${item.dataGroupMember.conversation_id}" href="javascript:;">
                                                   <i class="fa fa-reply" aria-hidden="true"></i>
                                                        Tham gia
                                                </a>
                                        </div>
                                    </td>
                                    <td class="mailbox-star"><span class="right badge badge-danger">Mới</span></td>
                                    <td class="mailbox-name"><a href="read-mail.html">${item.dataGroupMember.user_first.name}</a></td>
                                    <td class="mailbox-subject"><b id="${item.dataGroupMember.conversation_id}" >${content != false ? content : ""} cần hỗ trợ</b>
                                    </td>
                                    <td class="mailbox-attachment"></td>
                                    <td class="mailbox-date">${item.dataGroupMember.createdAt}</td>
                                </tr>`);
        });

        socket.on("sendDataServerPrivate", (item) => {
            renderComment(item.dataMessage);
            console.log("sendDataServerPrivate >> ", item);
        });
        socket.on("sendDataServerNewTopMessage", (item) => {
            $('#' + item.conversation_id).text(item.content);
            console.log("sendDataServerNewTopMessage >>", item);
        });

        function renderComment(dataMessage) {
             console.log(globalConversationId, dataMessage);
            if(globalConversationId == dataMessage.conversation_id){
                if(dataAdmin.id == dataMessage.user_id._id){
                    $('#chat').append(`<div class="direct-chat-msg right">
                                                                    <div class="direct-chat-infos clearfix">
                                                                    <span class="direct-chat-name float-right">(Bạn) ${dataMessage.user_id.name}</span>
                                                                    <span class="direct-chat-timestamp float-left">${dataMessage.createdAt}</span>
                                                                    </div>

                                                                    <img class="direct-chat-img" src="https://haycafe.vn/wp-content/uploads/2021/12/Anh-thien-nhien-dep-va-tran-ngap-suc-song.jpg" alt="message user image">

                                                                    <div class="direct-chat-text">
                                                                    ${dataMessage.content}
                                                                    </div>

                                                            </div>`);
                                                            $("#chat").scrollTop($("#chat")[0].scrollHeight);
                }else {
                    $('#chat').append(` <div class="direct-chat-msg">
                                                                    <div class="direct-chat-infos clearfix">
                                                                        <span class="direct-chat-name float-left"> ${dataMessage.user_id.name}</span>
                                                                        <span class="direct-chat-timestamp float-right">${dataMessage.createdAt}</span>
                                                                    </div>

                                                                  
                                                                    <div class="direct-chat-img text-center bg-secondary pt-2 pb-2"> ${dataMessage.user_id.name[(dataMessage.user_id.name).lastIndexOf(" ") + 1]}</div>
                                                                    <div class="direct-chat-text">
                                                                    ${dataMessage.content}
                                                                    </div>

                                                                </div>`);
                                                                $("#chat").scrollTop($("#chat")[0].scrollHeight);
                }
                
            }
        }





        //const myTimeout = setTimeout(myGreeting, 1000);
        myGreeting();

        function myGreeting() {
            chatUser = JSON.parse(localStorage.getItem("user"));
            $.ajax({
                    method: "POST",
                    url: `${host}get-group-member-admin-null`,
                })
                .done(function(msg) {
                    console.log(msg);
                    msg.map((value, key) => {
                        $('#show-list-conversation').append(` <tr  >
                                    <td>
                                        <div class="icheck-primary">
                                              <a class="btn btn-danger btn-sm reply-single" data-conversation="${value.conversation_id}" href="javascript:;">
                                                   <i class="fa fa-reply" aria-hidden="true"></i>
                                                        Tham gia
                                                </a>
                                        </div>
                                    </td>
                                    <td class="mailbox-star"><span class="right badge badge-danger">Mới</span></td>
                                    <td class="mailbox-name"><a href="read-mail.html">${value.user_first.name}</a></td>
                                    <td class="mailbox-subject"><b id="${value.conversation_id}" >${value.user_first.name} cần hỗ trợ</b>
                                    </td>
                                    <td class="mailbox-attachment"></td>
                                    <td class="mailbox-date">${value.createdAt}</td>
                                </tr>`);

                    })
                });

            $.ajax({
                    method: "POST",
                    url: `${host}get-all-chat-admin`,
                })
                .done(function(msg) {
                    console.log(msg);
                    msg.map((value, key) => {
                        $('#show-list-conversation-admin').append(` <tr  >
                                    <td>
                                        <div class="icheck-primary">
                                              <a class="btn btn-success btn-sm btn-join" data-conversation="${value.conversation_id}" href="javascript:;">
                                                   <i class="fa fa-reply" aria-hidden="true"></i>
                                                        Trả lời
                                                </a>
                                        </div>
                                    </td>
                                    <td class="mailbox-name"><a href="read-mail.html"><span class="right badge badge-danger">Admin</span> ${value.user_second.name}</a></td>
                                    <td class="mailbox-name"><a href="read-mail.html"> ${checkOnline(value.user_first._id)} ${value.user_first.name} </a></td>
                                    <td class="mailbox-subject"><b id="${value.conversation_id}" > ... </b>
                                    </td>
                                    <td class="mailbox-attachment"></td>
                                    <td class="mailbox-date">${value.createdAt}</td>
                                </tr>`);

                    })
                })

            //get-all-chat-admin

        }

    });
</script>


<?php $this->loadView('admin/Layout/footer') ?>