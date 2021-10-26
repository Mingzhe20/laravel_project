<!DOCTYPE html>
<html>

<head>
    <title>Contact Us</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        textarea {
            resize: none;
        }

        .form-label {
            font-size: 12px;
            color: #5e9bfc;
            margin: 0;
            display: block;
            opacity: 1;
            -webkit-transition: .333s ease top, .333s ease opacity;
            transition: .333s ease top, .333s ease opacity;
        }

        .form-control {
            border-radius: 0;
            border-color: #ccc;
            border-width: 0 0 2px 0;
            border-style: none none solid none;
            box-shadow: none;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #5e9bfc;
        }

        .js-hide-label {
            opacity: 0;
        }

        .js-unhighlight-label {
            color: #999
        }

        .btn-start-order {
            background: 0 0 #ffffff;
            border: 1px solid #2f323a;
            border-radius: 3px;
            color: #2f323a;
            font-family: "Raleway", sans-serif;
            font-size: 16px;
            line-height: inherit;
            margin: 30px 0;
            padding: 10px 50px;
            text-transform: uppercase;
            transition: all 0.25s ease 0s;
        }

        .btn-start-order:hover,
        .btn-start-order:active,
        .btn-start-order:focus {
            border-color: #5e9bfc;
            color: #5e9bfc;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/home">Newsletter</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contactus">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/message">Message</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row p-3 ">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12 text-center">
                <h2>Contact Us</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xs-offset-3">
                <form id="contact-form" class="form" action="/contactus" method="POST">
                @csrf
                    <div class="form-group">
                        <label class="form-label" for="name">Your Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" maxlength="50" tabindex="1" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email">Your Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" maxlength="50" tabindex="2" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="message">Message</label>
                        <textarea rows="5" cols="50" name="message" class="form-control" id="message" placeholder="Message..." tabindex="4" required></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-start-order">Send Message</button>
                    </div>
                </form>
             
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>