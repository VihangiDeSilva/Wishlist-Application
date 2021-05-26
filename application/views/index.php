<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel='stylesheet'
          href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <!--
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://underscorejs.org/underscore.js"></script>
    <script src="http://backbonejs.org/backbone.js"></script>
    -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.3.3/underscore-min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/backbone.js/0.9.2/backbone-min.js" type="text/javascript"></script> 
    <script src="<?php echo base_url(); ?>assets/js/app.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/models/user.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/models/listItem.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/views/loginFormView.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/views/listView.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/views/itemView.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/routers/approuter.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
          integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

         

</head>
<body>
<script type="text/template" id="login-template">

    <div class="card-cust"></div>
    <div class="card-cust">
        <h1 class="title">Login</h1>
        <form>

            <div class="input-container">
                <input type="text" id="login-username" value="<%= username%>" name="username" required="required"/>
                <label for="username">Username</label>
                <div class="bar"></div>
            </div>
            <div class="input-container">
                <input type="password" id="login-password" value="<%= password%>" name="password" required="required"/>
                <label for="username">Password</label>
                <div class="bar"></div>
            </div>
            <p id="msg"></p>
            <div class="button-container cust-log-style">
                <button id="btn-login"><span>Login</span></button>
            </div>

        </form>
    </div>
    <div class="card-cust alt" style="background-color: #191919">
        <div class="toggle"></div>
        <h1 class="title">Sign Up
            <div class="close"></div>
        </h1>
        <form>
            <div class="input-container">
                <input type="text" id="reg-username" value="<%= username%>" required="required"/>
                <label for="username">Username</label>
                <div class="bar"></div>
            </div>
            <div class="input-container">
                <input type="password" id="reg-password" value="<%= password%>" required="required"/>
                <label for="password">Password</label>
                <div class="bar"></div>
            </div>
            <div class="input-container">
                <input type="password" id="rpt-password" required="required"/>
                <label for="rpt-password">Repeat Password</label>
                <div class="bar"></div>
            </div>
            <div class="input-container">
                <input type="text" id="list-name" required="required" value="<%= list_name%>"/>
                <label for="rpt-password">List Name</label>
                <div class="bar"></div>
            </div>
            <div class="input-container ">
                <input type="text" id="description" name="description" required="required" value="<%= list_name%>"/>
                <label for="">Description</label>
                <div class="bar"></div>

            </div>
            <div class="button-container">
                <button id="btn-register"><span>Sign Up</span></button>
            </div>
        </form>
</script>

<script type="text/template" id="list-template">

    <div class="pen-title text-center">
        <div><h1><%=list_name%></h1><span><%=list_description%></span></div>
        <button id="btn-add" class="add-btn-cust"><i class="fas fa-plus-circle"></i>Add New Item</button>
        <button id="btn-share" class="add-btn-cust btn-share"><i class="fas fa-share-alt-square"></i>Share List</button>
    </div>
    <h1 id="item_status" style="display: none">No Items</h1>
    <div id="item">

    </div>
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span class="close"><i class="far fa-times-circle"></i></span>
            <form>
                <div class="form-group">
                    <label for="title">Name</label>
                    <input type="text" id="title" class="form-control">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" id="description" class="form-control">
                </div>
                <div class="form-group">
                    <label for="url">URL</label>
                    <input class="form-control" type="text" id="url">
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" step="0.01" class="form-control" id="price">
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select class="form-control" id="category">
                        <option value="1">Birthday</option>
                        <option value="2">Anniversary</option>
                        <option value="3">Christmas</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="status">
                        <option value="1">Must Have</option>
                        <option value="2">Would be Nice to Have</option>
                        <option value="3">If You Can</option>
                    </select>
                </div>
                <button id="submit-add" type="submit" class="btn btn-primary float-right add-btn-cust">Submit</button>
            </form>
        </div>
    </div>
    <div id="editModal" class="modal"></div>
    <div id="shareModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span id="close-share" class="close"><i class="far fa-times-circle"></i></span>
            <p>Share the link</p>
           <a href="#share/<%=id%>" target="_blank">index.php/share/<%=id%></a>
        </div>
    </div>
</script>

<script type="text/template" id="item-template" class="container-only-list">

    <div class="row no-gutters align-items-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row no-gutters">
                        <div class="col-md-12">
                            <div class="row align-items-center">
                                <div class="col-md-9">
                                    <h5 class="card-title"><%=title%></h5>
                                    <h6 class="card-subtitle mb-2 text-muted"><%=price%></h6>
                                    <p class="card-subtitle mb-2 text-muted">Category: <%if(status_id=='1'){%>
                                        Bithday
                                        <%}else if(status_id=='2'){%>
                                        Anniversary
                                        <%}else{%>
                                        Christmas<%}%></p>
                                    <p class="item-des"><%=description%></p>

                                </div>
                                <div class="col-md-3 add-edit text-center">
                                    <a href="<%=url%>" target="_blank" class="card-link view-btn"><i
                                                class="fas fa-eye"></i></a>
                                    <a id="btn-edit" data-id="<%=id%>"><i class="fas fa-edit"></i></a>
                                    <a id="btn-delete" data-id="<%=id%>"><i class="fas fa-trash"></i></a>
                                    <p class="card-text prio-list"><%if(status_id=='1'){%>
                                        Must Have
                                        <%}else if(status_id=='2'){%>
                                        Would be Nice to Have
                                        <%}else{%>
                                        If you can<%}%></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</script>

<script type="text/template" id="edit-template">
    <!-- Modal content -->
    <div class="modal-content">
        <span class="close"><i class="far fa-times-circle"></i></span>
        <form>
            <div class="form-group">
                <label for="title">Name</label>
                <input type="text" value="<%=title%>" id="edit-title" class="form-control">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" id="edit-description" value="<%=description%>" class="form-control">
            </div>
            <div class="form-group">
                <label for="url">URL</label>
                <input class="form-control" type="text" value="<%=url%>" id="edit-url">
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" value="<%=price%>" class="form-control" id="edit-price">
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" id="edit-category">
                    <option value="1"
                    <%if(category_id==1){%>selected<%}%>>Birthday</option>
                    <option value="2"
                    <%if(category_id==2){%>selected<%}%>>Anniversary</option>
                    <option value="3"
                    <%if(category_id==3){%>selected<%}%>>Christmas</option>
                </select>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="edit-status">
                    <option value="1"
                    <%if(status_id==1){%>selected<%}%> >Must Have</option>
                    <option value="2"
                    <%if(status_id==2){%>selected<%}%> >Would be Nice to Have</option>
                    <option value="3"
                    <%if(status_id==3){%>selected<%}%> >If You Can</option>
                </select>
            </div>
            <input type="hidden" value="<%=id%>" id="id">
            <button id="submit-edit" type="submit" class="btn btn-primary float-right add-btn-cust">Submit</button>
        </form>
    </div>
</script>

<script type="text/template" id="logout-template">
    <nav id="navbar" class="navbar fixed-top navbar-light bg-light">
        <a class="navbar-brand" id="logout" href="#">Hi, <%=username%></a>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#logout"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
        </ul>

    </nav>

</script>

<script type="text/template" id="status-template"></script>

<script type="text/template" id="share-template">
    <h1 id="item_status" style="display: none">No Items</h1>
    <div class="pen-title">
        <h1><%=list_name%></h1><span><%=description%></span>
    </div>
    <div id="item">

    </div>
</script>

<div class="container container-cust">
</div>
</div>
</body>
</html>

<style>
    .container {
        position: relative !important;
        max-width: 460px !important;
        width: 100% !important;
        margin: 80px auto 100px !important;
    }

    .input-container textarea {
        width: 100%;
        background-color: white;
        color: black;
    }

    .add-edit i {
        cursor: pointer;
        margin: 0 5px;
    }

    .view-link {
        color: #000000;
        border: 1px solid #000000;
        padding: 3px 8px;
    }

    .view-link:hover {
        background-color: #000000;
        color: #ffffff;
    }

    .card {
        width: 100% !important;
        border-radius: 12px;
        margin-bottom: 15px;
        -webkit-box-shadow: 0px 0px 16px 0px rgba(194, 194, 194, 1);
        -moz-box-shadow: 0px 0px 16px 0px rgba(194, 194, 194, 1);
        box-shadow: 0px 0px 16px 0px rgba(194, 194, 194, 1);
    }


    #item {
        background-color: #e5e5e5 !important;
        padding: 25px 15px 10px 15px;
        border-radius: 12px;
    }

    .view-btn {
        color: #000000;
        font-size: 17px;
        position: relative;
        top: 1px;
    }

    .prio-list {
        margin-top: 10px;
        font-weight: bold;
    }

    .item-des {
        margin-bottom: 0;
        color: #6c757d !important;
        font-size: 14px;
        min-height: 50px;
    }

    .container {
        max-width: 670px !important;
    }

    .card-cust.alt .toggle {
        background: #000000
    }

    .card-cust .title {
        border-left: 5px solid #000000;
        color: #000000;
    }


    .card-cust .button-container button:hover, .card-cust .button-container button:active, .card-cust .button-container button:focus {
        border-color: #000000;
        color: #ffffff !important;
    }

    .card-cust .button-container button:hover span, .card-cust .button-container button:active span, .card-cust .button-container button:focus span {
        color: #000000;
    }

    .card-cust .button-container button:before {
        background: #000000;
        color: #ffffff;
    }


    #btn-login span:hover {
        color: #000000;
    }

    #btn-login span:active {
        color: #ffffff;
    }

    .card-cust .button-container button:hover span, .card-cust .button-container button:active span, .card-cust .button-container button:focus span {
        color: #ffffff;
    }

    .add-btn-cust {
        background-color: white;
        box-shadow: none;
        border: 1px solid black;
        padding: 4px 15px;
        cursor: pointer;
        color: #000000;
        margin-top: 40px;
        border-radius: 5px;
        margin-bottom: 17px;
    }

    .add-btn-cust:hover {
        background-color: #000000;
        color: #ffffff;
    }

    .add-btn-cust i {
        margin-right: 8px;

    }

    .btn-share {
        margin-right: 10px;
    }

    .pen-title h1 {
        margin: 0 0 6px;
    }

    .pen-title {
        padding: 50px 0;
        padding-bottom: 0;
    }

    .modal-content {
        width: 30%;
        margin: 10% auto;
        border-radius: 12px;
    }

    .close {
        text-align: right;
    }

    .form-group label {
        margin-bottom: 0;
        font-size: 14px;
        font-weight: 600;
    }

    /* .card-cust .button-container button:hover span, .card-cust .button-container button:active span, .card-cust .button-container button:focus span {
         color: #000000;
     }*/

    .card-cust.alt .button-container button:hover {
        background: #ffffff;
    }

    .card-cust.alt .button-container button span {
        color: #000000;
    }

    .cust-log-style .card-cust .button-container button:hover span, .card-cust .button-container button:active span, .card-cust .button-container button:focus span {
        color: #ffffff;
    }

    .cust-log-style .card-cust .button-container button span:hover, .card-cust .button span-container button span:active, .card-cust .button-container button span:focus {
        color: #000000;
    }
</style>