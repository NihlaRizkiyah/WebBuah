<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .alert {
            border: none
        }

        .alert p {
            margin-bottom: 0
        }

        .alert button.close {
            line-height: .75;
            padding: .75rem
        }

        .alert .alert-heading,
        .alert .alert-heading+p {
            margin-left: .4rem
        }

        .alert-primary {
            background-color: #435ebe;
            color: #fff
        }

        .alert-primary a {
            color: #fff;
            font-weight: 700
        }

        .alert-secondary {
            background-color: #ebeef3;
            color: #383d41
        }

        .alert-secondary a {
            color: #fff;
            font-weight: 700
        }

        .alert-success {
            background-color: #4fbe87;
            color: #fff
        }

        .alert-success a {
            color: #fff;
            font-weight: 700
        }

        .alert-warning {
            background-color: #eaca4a;
            color: #fff
        }

        .alert-warning a {
            color: #fff;
            font-weight: 700
        }

        .alert-danger {
            background-color: #f3616d;
            color: #fff
        }

        .alert-danger a {
            color: #fff;
            font-weight: 700
        }

        .alert-dark {
            background-color: #454546;
            color: #fff
        }

        .alert-dark a {
            color: #fff;
            font-weight: 700
        }

        .alert-light {
            background-color: #f9f9f9;
            color: #818182
        }

        .alert-light a {
            color: #fff;
            font-weight: 700
        }

        .alert-info {
            background-color: #56b6f7;
            color: #fff
        }

        .alert-info a {
            color: #fff;
            font-weight: 700
        }

        .alert-light-primary {
            background-color: #ebf3ff
        }

        .alert-light-secondary {
            background-color: #e6eaee
        }

        .alert-light-success {
            background-color: #d2ffe8
        }

        .alert-light-danger {
            background-color: #ffdede
        }

        .alert-light-warning {
            background-color: #fffdd8
        }

        .alert-light-info {
            background-color: #e6fdff
        }

        .avatar {
            border-radius: 50%;
            display: inline-flex;
            position: relative;
            text-align: center;
            vertical-align: middle
        }

        .avatar .avatar-content {
            align-items: center;
            color: #fff;
            display: flex;
            font-size: .875rem;
            height: 32px;
            justify-content: center;
            width: 32px
        }

        .avatar .avatar-content i,
        .avatar .avatar-content svg {
            color: #fff;
            font-size: 1rem;
            height: 1rem
        }

        .avatar img {
            border-radius: 50%;
            height: 32px;
            width: 32px
        }

        .avatar .avatar-status {
            border: 1px solid #fff;
            border-radius: 50%;
            bottom: 0;
            height: .7rem;
            position: absolute;
            right: 0;
            width: .7rem
        }

        .avatar.avatar-sm .avatar-content,
        .avatar.avatar-sm img {
            font-size: .8rem;
            height: 24px;
            width: 24px
        }

        .avatar.avatar-md .avatar-content,
        .avatar.avatar-md img {
            font-size: .8rem;
            height: 32px;
            width: 32px
        }

        .avatar.avatar-md2 .avatar-content,
        .avatar.avatar-md2 img {
            font-size: .8rem;
            height: 40px;
            width: 40px
        }

        .avatar.avatar-lg .avatar-content,
        .avatar.avatar-lg img {
            font-size: 1.2rem;
            height: 48px;
            width: 48px
        }

        .avatar.avatar-xl .avatar-content,
        .avatar.avatar-xl img {
            font-size: 1.4rem;
            height: 60px;
            width: 60px
        }

        .btn .badge {
            border-radius: 50%;
            margin-left: 5px
        }

        .btn .badge.bg-transparent {
            background-color: hsla(0, 0%, 100%, .25) !important;
            color: #fff
        }

        .btn i,
        .btn svg {
            height: 16px;
            width: 16px
        }

        .btn.icon {
            padding: .4rem .6rem
        }

        .btn.icon svg {
            height: 16px;
            width: 16px
        }

        .btn.icon.icon-left svg {
            margin-right: 3px
        }

        .btn.icon.icon-right svg {
            margin-left: 3px
        }

        .btn.btn-outline-white {
            border-color: #fff;
            color: #fff
        }

        .btn.btn-outline-white:hover {
            background-color: #fff;
            color: #333
        }

        .btn.btn-light-primary {
            background-color: #ebf3ff;
            color: #002152
        }

        .btn.btn-light-secondary {
            background-color: #e6eaee;
            color: #181e24
        }

        .btn.btn-light-success {
            background-color: #d2ffe8;
            color: #00391c
        }

        .btn.btn-light-danger {
            background-color: #ffdede;
            color: #450000
        }

        .btn.btn-light-warning {
            background-color: #fffdd8;
            color: #3f3c00
        }

        .btn.btn-light-info {
            background-color: #e6fdff;
            color: #00474d
        }

        .btn.btn-danger,
        .btn.btn-info,
        .btn.btn-primary,
        .btn.btn-secondary,
        .btn.btn-success,
        .btn.btn-warning {
            color: #fff
        }

        .btn.btn-light {
            color: #607080
        }

        .btn.btn-dark {
            color: #fff
        }

        .btn-block {
            width: 100%
        }

        .btn-group:not(.dropdown) .btn:not([class*=btn-]) {
            border: 1px solid #dfe3e7
        }

        .btn-group>.btn {
            border-radius: .267rem
        }

        .buttons .btn {
            margin: 0 10px 10px 0
        }

        .breadcrumb.breadcrumb-right {
            justify-content: flex-end;
            margin-top: 1rem
        }

        .breadcrumb.breadcrumb-center {
            justify-content: center;
            margin-top: 1rem
        }

        .carousel-inner {
            border-radius: .7rem
        }

        .carousel-caption h5 {
            color: #fff
        }

        .card {
            border: none;
            margin-bottom: 2.2rem
        }

        .card.card-statistic {
            background: linear-gradient(180deg, #25a6f1, #54b9ff);
            box-shadow: 1px 2px 5px rgba(47, 170, 244, .5)
        }

        .card.card-statistic .card-title {
            color: #fff;
            font-size: 1.3rem;
            font-weight: 400;
            letter-spacing: .8px;
            margin-bottom: 0;
            margin-top: 5px;
            text-transform: uppercase
        }

        .card.card-statistic .card-right p {
            color: #fff;
            font-size: 1.5rem;
            margin-bottom: 0
        }

        .card.card-statistic .card-right span.green {
            color: #6fff6f
        }

        .card.card-statistic .card-right span.red {
            color: #ff7979
        }

        .card.card-statistic .chart-wrapper {
            height: 100px
        }

        .card .card-header {
            border: none
        }

        .card .card-header h4 {
            font-size: 1.2rem;
            font-weight: 700
        }

        .card .card-header~.card-body {
            padding-top: 0
        }

        .card .card-content {
            position: relative
        }

        .card .card-title {
            font-size: 1.2rem
        }

        .card .card-body {
            padding: 1.5rem
        }

        .card .card-heading {
            color: #555;
            font-size: 1.5rem
        }

        .card .card-img-overlay {
            background-color: rgba(0, 0, 0, .6)
        }

        .card .card-img-overlay p {
            color: #eee
        }

        .card .card-img-overlay .card-title {
            color: #fff
        }

        .pricing .card {
            border-right: 1px solid #e9ecef;
            box-shadow: none;
            box-shadow: 0 10px 10px #e9ecef;
            margin-bottom: .5rem
        }

        .pricing h1 {
            font-size: 4rem;
            margin-bottom: 3rem;
            text-align: center
        }

        .pricing .card-header .card-title {
            font-size: 2rem !important;
            margin-bottom: 0
        }

        .pricing .card-header p {
            font-size: .8rem
        }

        .pricing ul li {
            list-style: none;
            margin-bottom: .5rem
        }

        .pricing ul li i,
        .pricing ul li svg {
            color: #198754;
            font-size: 1rem;
            margin-right: 7px;
            width: 1rem
        }

        .pricing .card-highlighted {
            background-color: #435ebe;
            padding-bottom: 20px;
            padding-top: 20px
        }

        .pricing .card-highlighted .card-body,
        .pricing .card-highlighted .card-header {
            background-color: #435ebe;
            color: #fff
        }

        .pricing .card-highlighted ul li {
            color: #fff
        }

        .pricing .card-highlighted ul li i,
        .pricing .card-highlighted ul li svg {
            color: #479f76
        }

        .pricing .card-highlighted .card-footer {
            background-color: #435ebe
        }

        .pricing .card-highlighted .card-title {
            color: #fff;
            font-size: 1.8rem
        }

        .divider {
            display: block;
            margin: 1rem 0;
            overflow: hidden;
            text-align: center
        }

        .divider .divider-text {
            background-color: #fff;
            display: inline-block;
            padding: 0 1rem;
            position: relative
        }

        .divider .divider-text:after,
        .divider .divider-text:before {
            border-top: 1px solid #dfe3e7;
            content: "";
            position: absolute;
            top: 50%;
            width: 9999px
        }

        .divider .divider-text:before {
            right: 100%
        }

        .divider .divider-text:after {
            left: 100%
        }

        .divider.divider-left .divider-text {
            float: left;
            left: 0;
            padding-left: 0
        }

        .divider.divider-left-center .divider-text {
            left: -25%
        }

        .divider.divider-right-center .divider-text {
            left: 25%
        }

        .divider.divider-right .divider-text {
            float: right;
            padding-right: 0
        }

        .dropdown-toggle:after {
            color: #fff
        }

        .dropdown-menu-large {
            min-width: 16rem
        }

        .dropdown-menu {
            box-shadow: 0 0 30px rgba(0, 0, 0, .03)
        }

        .dropdown-item {
            transition: all .5s
        }

        .dropdown-menu-end.show {
            right: 0;
            top: 100%
        }

        .dropdown .avatar {
            margin-right: .6rem
        }

        .user-dropdown-name,
        .user-dropdown-status {
            margin: 0
        }

        .form-group {
            margin-bottom: .7rem
        }

        .form-group label {
            color: rgba(35, 28, 99, .7);
            font-weight: 600
        }

        .form-group small {
            font-size: .7rem
        }

        .form-group.with-title {
            position: relative
        }

        .form-group.with-title label {
            background-color: #e9ecef;
            font-size: .6rem;
            left: 0;
            padding: 5px;
            position: absolute;
            top: 0;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
            width: 100%
        }

        .form-group.with-title .form-control,
        .form-group.with-title dataTable-input {
            padding-top: 2rem
        }

        .form-group.with-title .form-control:focus~label,
        .form-group.with-title dataTable-input:focus~label {
            border-left: 1px solid #435ebe;
            border-right: 1px solid #435ebe;
            border-top: 1px solid #435ebe
        }

        .form-group[class*=has-icon-].has-icon-left .form-control {
            padding-left: 2.5rem
        }

        .form-group[class*=has-icon-].has-icon-left .form-control-icon {
            left: 0
        }

        .form-group[class*=has-icon-].has-icon-right .form-control {
            padding-right: 2.5rem
        }

        .form-group[class*=has-icon-].has-icon-right .form-control-icon {
            right: 0
        }

        .form-group[class*=has-icon-] .form-control:focus~.form-control-icon i,
        .form-group[class*=has-icon-] .form-control:focus~.form-control-icon svg {
            color: #5a8dee
        }

        .form-group[class*=has-icon-] .form-control.form-control-xl {
            padding-left: 3rem
        }

        .form-group[class*=has-icon-] .form-control.form-control-xl~.form-control-icon i {
            font-size: 1.6rem
        }

        .form-group[class*=has-icon-] .form-control.form-control-xl~.form-control-icon i:before {
            color: #a6a8aa
        }

        .form-group[class*=has-icon-] .form-control-icon {
            padding: 0 .6rem;
            position: absolute;
            top: 50%;
            transform: translateY(-50%)
        }

        .form-group[class*=has-icon-] .form-control-icon i,
        .form-group[class*=has-icon-] .form-control-icon svg {
            color: #adb5bd;
            font-size: 1.2rem;
            width: 1.2rem
        }

        .form-group[class*=has-icon-] .form-control-icon i:before,
        .form-group[class*=has-icon-] .form-control-icon svg:before {
            vertical-align: sub
        }

        .form-control.form-control-xl {
            font-size: 1.2rem;
            padding: .85rem 1rem
        }

        .form-check .form-check-input[class*=bg-] {
            border: 0
        }

        .form-check .form-check-input:focus {
            box-shadow: none
        }

        .form-check .form-check-input.form-check-primary {
            background-color: #435ebe;
            border-color: #435ebe
        }

        .form-check .form-check-input.form-check-primary:not(:checked) {
            background-color: transparent;
            border: 1px solid #ced4da
        }

        .form-check .form-check-input.form-check-primary.form-check-glow {
            box-shadow: 0 0 5px #697ecb
        }

        .form-check .form-check-input.form-check-primary.form-check-glow:not(:checked) {
            box-shadow: none
        }

        .form-check .form-check-input.form-check-secondary {
            background-color: #6c757d;
            border-color: #6c757d
        }

        .form-check .form-check-input.form-check-secondary:not(:checked) {
            background-color: transparent;
            border: 1px solid #ced4da
        }

        .form-check .form-check-input.form-check-secondary.form-check-glow {
            box-shadow: 0 0 5px #868e96
        }

        .form-check .form-check-input.form-check-secondary.form-check-glow:not(:checked) {
            box-shadow: none
        }

        .form-check .form-check-input.form-check-success {
            background-color: #198754;
            border-color: #198754
        }

        .form-check .form-check-input.form-check-success:not(:checked) {
            background-color: transparent;
            border: 1px solid #ced4da
        }

        .form-check .form-check-input.form-check-success.form-check-glow {
            box-shadow: 0 0 5px #21b26f
        }

        .form-check .form-check-input.form-check-success.form-check-glow:not(:checked) {
            box-shadow: none
        }

        .form-check .form-check-input.form-check-info {
            background-color: #0dcaf0;
            border-color: #0dcaf0
        }

        .form-check .form-check-input.form-check-info:not(:checked) {
            background-color: transparent;
            border: 1px solid #ced4da
        }

        .form-check .form-check-input.form-check-info.form-check-glow {
            box-shadow: 0 0 5px #3cd5f4
        }

        .form-check .form-check-input.form-check-info.form-check-glow:not(:checked) {
            box-shadow: none
        }

        .form-check .form-check-input.form-check-warning {
            background-color: #ffc107;
            border-color: #ffc107
        }

        .form-check .form-check-input.form-check-warning:not(:checked) {
            background-color: transparent;
            border: 1px solid #ced4da
        }

        .form-check .form-check-input.form-check-warning.form-check-glow {
            box-shadow: 0 0 5px #ffce3a
        }

        .form-check .form-check-input.form-check-warning.form-check-glow:not(:checked) {
            box-shadow: none
        }

        .form-check .form-check-input.form-check-danger {
            background-color: #dc3545;
            border-color: #dc3545
        }

        .form-check .form-check-input.form-check-danger:not(:checked) {
            background-color: transparent;
            border: 1px solid #ced4da
        }

        .form-check .form-check-input.form-check-danger.form-check-glow {
            box-shadow: 0 0 5px #e4606d
        }

        .form-check .form-check-input.form-check-danger.form-check-glow:not(:checked) {
            box-shadow: none
        }

        .form-check .form-check-input.form-check-light {
            background-color: #f8f9fa;
            border-color: #f8f9fa
        }

        .form-check .form-check-input.form-check-light:not(:checked) {
            background-color: transparent;
            border: 1px solid #ced4da
        }

        .form-check .form-check-input.form-check-light.form-check-glow {
            box-shadow: 0 0 5px #fff
        }

        .form-check .form-check-input.form-check-light.form-check-glow:not(:checked) {
            box-shadow: none
        }

        .form-check .form-check-input.form-check-dark {
            background-color: #212529;
            border-color: #212529
        }

        .form-check .form-check-input.form-check-dark:not(:checked) {
            background-color: transparent;
            border: 1px solid #ced4da
        }

        .form-check .form-check-input.form-check-dark.form-check-glow {
            box-shadow: 0 0 5px #383f45
        }

        .form-check .form-check-input.form-check-dark.form-check-glow:not(:checked) {
            box-shadow: none
        }

        .form-check.form-check-sm .form-check-input {
            height: .9rem;
            margin-top: .3em;
            width: .9rem
        }

        .form-check.form-check-sm label {
            font-size: .7rem
        }

        .form-check.form-check-lg .form-check-input {
            height: 1.5rem;
            margin-top: .3em;
            width: 1.5rem
        }

        .form-check.form-check-lg label {
            font-size: 1rem
        }

        .form-check.form-check-primary .form-check-input {
            background-color: #435ebe;
            border-color: #435ebe
        }

        .form-check.form-check-secondary .form-check-input {
            background-color: #6c757d;
            border-color: #6c757d
        }

        .form-check.form-check-success .form-check-input {
            background-color: #198754;
            border-color: #198754
        }

        .form-check.form-check-info .form-check-input {
            background-color: #0dcaf0;
            border-color: #0dcaf0
        }

        .form-check.form-check-warning .form-check-input {
            background-color: #ffc107;
            border-color: #ffc107
        }

        .form-check.form-check-danger .form-check-input {
            background-color: #dc3545;
            border-color: #dc3545
        }

        .form-check.form-check-light .form-check-input {
            background-color: #f8f9fa;
            border-color: #f8f9fa
        }

        .form-check.form-check-dark .form-check-input {
            background-color: #212529;
            border-color: #212529
        }

        .dataTable-input {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background-clip: padding-box;
            background-color: #fff;
            border: 1px solid #dfe3e7;
            border-radius: .25rem;
            color: #555252;
            font-size: .9025rem;
            font-weight: 400;
            line-height: 1.5;
            min-height: calc(1.5em + .934rem + 2px);
            padding: .467rem .6rem;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out
        }

        .dataTable-input:focus {
            background-color: #fff;
            border-color: #5a8dee;
            box-shadow: 0 3px 8px 0 rgba(0, 0, 0, .1);
            color: #555252;
            outline: 0
        }

        .modal .modal-content {
            border: none;
            box-shadow: -8px 12px 18px 0 rgba(25, 42, 70, .13)
        }

        .modal .modal-full {
            max-width: 94%
        }

        .modal .white {
            color: #fff
        }

        .modal .modal-header {
            align-items: center;
            display: flex;
            justify-content: space-between
        }

        .modal .modal-header .modal-title {
            font-size: 1.1rem
        }

        .modal .modal-header .close {
            background: none;
            border: none;
            border-radius: 50%;
            padding: 7px 10px
        }

        .modal .modal-header .close:hover {
            background: #dee2e6
        }

        .modal .modal-header i,
        .modal .modal-header svg {
            font-size: 12px;
            height: 12px;
            width: 12px
        }

        .modal .modal-footer {
            padding: 1rem
        }

        .modal.modal-borderless .modal-header {
            border-bottom: 0
        }

        .modal.modal-borderless .modal-footer {
            border-top: 0
        }

        #sidebar.active .sidebar-wrapper {
            left: 0
        }

        #sidebar:not(.active) .sidebar-wrapper {
            left: -300px
        }

        #sidebar:not(.active)~#main {
            margin-left: 0
        }

        .sidebar-wrapper {
            background-color: #fff;
            bottom: 0;
            height: 100vh;
            overflow-y: auto;
            position: fixed;
            top: 0;
            transition: left .5s ease-out;
            width: 300px;
            z-index: 10
        }

        .sidebar-wrapper .sidebar-header {
            font-size: 2rem;
            font-weight: 700;
            padding: 2rem 2rem 1rem
        }

        .sidebar-wrapper .sidebar-header img {
            height: 1.2rem
        }

        .sidebar-wrapper .sidebar-toggler.x {
            display: none;
            position: absolute;
            right: 0;
            top: .5rem
        }

        .sidebar-wrapper .menu {
            font-weight: 600;
            margin-top: 2rem;
            padding: 0 2rem
        }

        .sidebar-wrapper .menu .sidebar-title {
            color: #25396f;
            font-size: 1rem;
            font-weight: 600;
            list-style: none;
            margin: 1.5rem 0 1rem;
            padding: 0 1rem
        }

        .sidebar-wrapper .menu .sidebar-link {
            align-items: center;
            border-radius: .5rem;
            color: #25396f;
            display: block;
            display: flex;
            font-size: 1rem;
            padding: .7rem 1rem;
            text-decoration: none;
            transition: all .5s
        }

        .sidebar-wrapper .menu .sidebar-link i,
        .sidebar-wrapper .menu .sidebar-link svg {
            color: #7c8db5
        }

        .sidebar-wrapper .menu .sidebar-link span {
            margin-left: 1rem
        }

        .sidebar-wrapper .menu .sidebar-link:hover {
            background-color: #f0f1f5
        }

        .sidebar-wrapper .menu .sidebar-item {
            list-style: none;
            margin-top: .5rem;
            position: relative
        }

        .sidebar-wrapper .menu .sidebar-item.has-sub .sidebar-link:after {
            color: #ccc;
            content: url('data:image/svg+xml;charset=utf-8,<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><path style="fill:none;stroke:gray;stroke-width:1" d="m6 9 6 6 6-6"/></svg>');
            display: block;
            position: absolute;
            right: 15px;
            top: 12px
        }

        .sidebar-wrapper .menu .sidebar-item.active>.sidebar-link {
            background-color: #435ebe
        }

        .sidebar-wrapper .menu .sidebar-item.active>.sidebar-link span {
            color: #fff
        }

        .sidebar-wrapper .menu .sidebar-item.active>.sidebar-link i,
        .sidebar-wrapper .menu .sidebar-item.active>.sidebar-link svg {
            fill: #fff;
            color: #fff
        }

        .sidebar-wrapper .menu .sidebar-item.active>.sidebar-link.has-sub:after {
            content: url('data:image/svg+xml;charset=utf-8,<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><path style="fill:none;stroke:%23fff;stroke-width:1" d="m6 9 6 6 6-6"/></svg>')
        }

        .sidebar-wrapper .menu .submenu {
            display: none;
            list-style: none;
            overflow: hidden;
            transition: max-height 2s cubic-bezier(0, .55, .45, 1)
        }

        .sidebar-wrapper .menu .submenu.active {
            display: block;
            max-height: 999px
        }

        .sidebar-wrapper .menu .submenu .submenu-item.active {
            position: relative
        }

        .sidebar-wrapper .menu .submenu .submenu-item.active>a {
            color: #435ebe;
            font-weight: 700
        }

        .sidebar-wrapper .menu .submenu .submenu-item a {
            color: #25396f;
            display: block;
            font-size: .85rem;
            font-weight: 600;
            letter-spacing: .5px;
            padding: .7rem 2rem;
            transition: all .3s
        }

        .sidebar-wrapper .menu .submenu .submenu-item a:hover {
            margin-left: .3rem
        }

        .sidebar-backdrop {
            background-color: rgba(0, 0, 0, .5);
            height: 100%;
            left: 0;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 9
        }

        @media screen and (max-width:1199px) {
            .sidebar-wrapper {
                left: -300px;
                position: absolute
            }

            .sidebar-wrapper .sidebar-toggler.x {
                display: block
            }
        }

        .nav-pills .nav-link.active {
            box-shadow: 0 2px 10px rgba(67, 94, 190, .5)
        }

        .nav-tabs,
        .nav-tabs .nav-link {
            border: none
        }

        .nav-tabs .nav-link:hover {
            border: none;
            text-shadow: 0 0 2px rgba(67, 94, 190, .3)
        }

        .nav-tabs .nav-link.active {
            border: none;
            color: #435ebe;
            position: relative
        }

        .nav-tabs .nav-link.active:after {
            background-color: #435ebe;
            bottom: 0;
            box-shadow: 0 2px 5px rgba(67, 94, 190, .5);
            content: "";
            height: 2px;
            left: 0;
            position: absolute;
            width: 100%
        }

        .navbar-fixed {
            background-color: #fff;
            position: fixed
        }

        .navbar {
            height: 90px;
            padding: 1.5rem
        }

        .navbar .navbar-brand img {
            height: 1.5rem
        }

        .navbar .user-menu img {
            height: 39px;
            width: 39px
        }

        .navbar.navbar-header li {
            align-items: center;
            display: flex
        }

        .navbar.navbar-header li.nav-icon {
            margin-right: .4rem
        }

        .navbar.navbar-header li.nav-icon .nav-link {
            border-radius: 50%;
            display: block;
            padding: .4rem
        }

        .navbar.navbar-header li.nav-icon .nav-link:hover {
            background-color: #e9ecef
        }

        .navbar.navbar-header .dropdown>a {
            color: #6c757d;
            font-weight: 600
        }

        .navbar.navbar-header .dropdown>a svg {
            height: 24px;
            width: 24px
        }

        .navbar.navbar-header .dropdown>a:after {
            display: none
        }

        .layout-horizontal .header-top {
            background-color: #fff;
            padding: 1.1rem
        }

        .layout-horizontal .header-top .container {
            align-items: center;
            display: flex;
            justify-content: space-between
        }

        .layout-horizontal .header-top .burger-btn i {
            display: inline-block;
            height: 20px
        }

        .layout-horizontal .header-top .logo img {
            height: 20px
        }

        .layout-horizontal .header-top-right {
            align-items: center;
            display: flex;
            gap: 1rem
        }

        .layout-horizontal .main-navbar {
            background-color: #435ebe;
            padding: 1rem
        }

        .layout-horizontal .main-navbar ul {
            display: flex;
            gap: 2rem;
            list-style: none;
            margin-bottom: 0;
            padding: 0
        }

        .layout-horizontal .main-navbar ul .menu-link {
            align-items: center;
            display: flex;
            flex-direction: row;
            gap: .5rem;
            padding: .4rem 0;
            position: relative
        }

        .layout-horizontal .main-navbar ul .menu-link span {
            height: 20px
        }

        .layout-horizontal .main-navbar ul>.menu-item {
            position: relative
        }

        .layout-horizontal .main-navbar ul>.menu-item .menu-link {
            color: #dee2e6
        }

        .layout-horizontal .main-navbar ul>.menu-item.has-sub .menu-link {
            padding-right: 1.3rem
        }

        .layout-horizontal .main-navbar ul>.menu-item.has-sub .menu-link:after {
            color: #fff;
            content: url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24' fill='none' stroke='%23ccc' opacity='.7' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-chevron-down'%3E%3Cpath d='m6 9 6 6 6-6'/%3E%3C/svg%3E");
            display: block;
            position: absolute;
            right: 0;
            top: 7px
        }

        .layout-horizontal .main-navbar ul>.menu-item:hover .menu-link {
            color: #fff
        }

        .layout-horizontal .main-navbar ul>.menu-item:hover .submenu {
            opacity: 1;
            top: 100%;
            visibility: visible
        }

        .layout-horizontal .main-navbar .submenu {
            background-color: #fff;
            border-radius: .2rem;
            box-shadow: 0 5px 20px hsla(0, 0%, 39%, .1);
            opacity: 0;
            position: absolute;
            top: 125%;
            transition: all .3s cubic-bezier(0, .55, .45, 1);
            visibility: hidden;
            z-index: 999
        }

        .layout-horizontal .main-navbar .submenu .submenu-group-wrapper {
            position: relative
        }

        .layout-horizontal .main-navbar .submenu .submenu-group {
            display: table-cell;
            flex-wrap: wrap;
            max-height: 200px;
            min-width: 200px;
            padding: .5rem .3rem .3rem .5rem
        }

        .layout-horizontal .main-navbar .submenu .submenu-group .submenu-item,
        .layout-horizontal .main-navbar .submenu .submenu-group .submenu-item.has-sub .submenu-link {
            position: relative
        }

        .layout-horizontal .main-navbar .submenu .submenu-group .submenu-item.has-sub .submenu-link:after {
            content: url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%23888' class='bi bi-chevron-right'%3E%3Cpath fill-rule='evenodd' d='M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z'/%3E%3C/svg%3E");
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-40%)
        }

        .layout-horizontal .main-navbar .submenu .submenu-group .submenu-item a {
            color: #6c757d;
            display: block;
            padding: .6rem 2rem .6rem .6rem
        }

        .layout-horizontal .main-navbar .submenu .submenu-group .submenu-item a:hover {
            color: #343a40
        }

        .layout-horizontal .main-navbar .submenu .submenu-group .submenu-item:hover .subsubmenu {
            opacity: 1;
            top: 0;
            visibility: visible
        }

        .layout-horizontal .main-navbar .subsubmenu {
            background-color: #fff;
            border-radius: .2rem;
            border-radius: .3rem;
            box-shadow: 0 5px 20px hsla(0, 0%, 39%, .1);
            display: flex;
            flex-direction: column;
            gap: 0;
            left: 100%;
            min-width: 200px;
            opacity: 0;
            padding: .5rem;
            position: absolute;
            top: 125%;
            top: 1rem;
            transition: all .3s cubic-bezier(0, .55, .45, 1);
            visibility: hidden;
            z-index: 999
        }

        @media screen and (max-width:1199px) {
            .layout-horizontal .main-navbar {
                background-color: #f5f7fc;
                display: none;
                overflow: hidden;
                padding: 1rem
            }

            .layout-horizontal .main-navbar.active {
                max-height: none
            }

            .layout-horizontal .main-navbar ul {
                flex-direction: column;
                gap: 0
            }

            .layout-horizontal .main-navbar ul .menu-item.has-sub .menu-link:after {
                content: url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24' fill='none' stroke='%23888' opacity='.7' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-chevron-down'%3E%3Cpath d='m6 9 6 6 6-6'/%3E%3C/svg%3E") !important;
                top: unset
            }

            .layout-horizontal .main-navbar ul .menu-link {
                color: #6c757d !important;
                padding: 1rem 0
            }

            .layout-horizontal .main-navbar .submenu {
                background-color: unset;
                box-shadow: none;
                display: none;
                opacity: 1;
                padding: 0 1rem;
                position: static;
                transition: all .2s;
                visibility: visible !important
            }

            .layout-horizontal .main-navbar .submenu .submenu-group-wrapper {
                display: flex;
                flex-direction: column;
                max-height: unset
            }

            .layout-horizontal .main-navbar .submenu .submenu-group {
                max-height: unset;
                min-width: unset;
                padding: 0;
                width: 100%
            }

            .layout-horizontal .main-navbar .submenu.active {
                display: block
            }

            .layout-horizontal .main-navbar .subsubmenu {
                background-color: unset;
                box-shadow: none;
                display: none;
                opacity: 1;
                padding: 1rem;
                position: static;
                visibility: visible !important
            }

            .layout-horizontal .main-navbar .subsubmenu.active {
                display: block
            }
        }

        .pagination.pagination-primary .page-item.active .page-link {
            background-color: #435ebe;
            border-color: #435ebe;
            box-shadow: 0 2px 5px rgba(67, 94, 190, .3)
        }

        .pagination.pagination-secondary .page-item.active .page-link {
            background-color: #6c757d;
            border-color: #6c757d;
            box-shadow: 0 2px 5px hsla(208, 7%, 46%, .3)
        }

        .pagination.pagination-success .page-item.active .page-link {
            background-color: #198754;
            border-color: #198754;
            box-shadow: 0 2px 5px rgba(25, 135, 84, .3)
        }

        .pagination.pagination-info .page-item.active .page-link {
            background-color: #0dcaf0;
            border-color: #0dcaf0;
            box-shadow: 0 2px 5px rgba(13, 202, 240, .3)
        }

        .pagination.pagination-warning .page-item.active .page-link {
            background-color: #ffc107;
            border-color: #ffc107;
            box-shadow: 0 2px 5px rgba(255, 193, 7, .3)
        }

        .pagination.pagination-danger .page-item.active .page-link {
            background-color: #dc3545;
            border-color: #dc3545;
            box-shadow: 0 2px 5px rgba(220, 53, 69, .3)
        }

        .pagination.pagination-light .page-item.active .page-link {
            background-color: #f8f9fa;
            border-color: #f8f9fa;
            box-shadow: 0 2px 5px rgba(248, 249, 250, .3)
        }

        .pagination.pagination-dark .page-item.active .page-link {
            background-color: #212529;
            border-color: #212529;
            box-shadow: 0 2px 5px rgba(33, 37, 41, .3)
        }

        .page-item:not(.active) .page-link:hover {
            color: #000
        }

        .page-item i,
        .page-item svg {
            font-size: 13px;
            height: 13px;
            width: 13px
        }

        .page-item .page-link {
            font-size: .875rem
        }

        .page-item .page-link:focus {
            box-shadow: none
        }

        .page-item:first-child {
            margin-right: .4rem
        }

        .page-item:last-child {
            margin-left: .4rem
        }

        .dataTable-table td,
        .dataTable-table thead th,
        .table td,
        .table thead th {
            vertical-align: middle
        }

        .dataTable-table:not(.table-borderless) thead th,
        .table:not(.table-borderless) thead th {
            border-bottom: 1px solid #dedede !important
        }

        .table-md.dataTable-table tr td,
        .table-md.dataTable-table tr th,
        .table-sm.dataTable-table tr td,
        .table-sm.dataTable-table tr th,
        .table.table-md tr td,
        .table.table-md tr th,
        .table.table-sm tr td,
        .table.table-sm tr th {
            padding: 1rem
        }

        .table-lg.dataTable-table tr td,
        .table-lg.dataTable-table tr th,
        .table.table-lg tr td,
        .table.table-lg tr th {
            padding: 1.3rem
        }

        .dataTable-container {
            overflow-x: auto
        }

        .progress.progress-primary {
            overflow: visible
        }

        .progress.progress-primary .progress-bar {
            background-color: #435ebe;
            border-radius: .25rem
        }

        .progress.progress-secondary {
            overflow: visible
        }

        .progress.progress-secondary .progress-bar {
            background-color: #6c757d;
            border-radius: .25rem
        }

        .progress.progress-success {
            overflow: visible
        }

        .progress.progress-success .progress-bar {
            background-color: #198754;
            border-radius: .25rem
        }

        .progress.progress-info {
            overflow: visible
        }

        .progress.progress-info .progress-bar {
            background-color: #0dcaf0;
            border-radius: .25rem
        }

        .progress.progress-warning {
            overflow: visible
        }

        .progress.progress-warning .progress-bar {
            background-color: #ffc107;
            border-radius: .25rem
        }

        .progress.progress-danger {
            overflow: visible
        }

        .progress.progress-danger .progress-bar {
            background-color: #dc3545;
            border-radius: .25rem
        }

        .progress.progress-light {
            overflow: visible
        }

        .progress.progress-light .progress-bar {
            background-color: #f8f9fa;
            border-radius: .25rem
        }

        .progress.progress-dark {
            overflow: visible
        }

        .progress.progress-dark .progress-bar {
            background-color: #212529;
            border-radius: .25rem
        }

        .progress.progress-sm {
            height: .4rem
        }

        .progress.progress-lg {
            height: 1.5rem
        }

        .progress .progress-bar {
            overflow: visible;
            position: relative
        }

        .progress .progress-bar.progress-label:before {
            color: #495057;
            content: attr(aria-valuenow) "%";
            font-size: .8rem;
            position: absolute;
            right: 0;
            top: -1.3rem
        }

        .bi {
            height: 1rem;
            width: 1rem
        }

        .bi.bi-middle:before {
            vertical-align: middle
        }

        .bi.bi-sub:before {
            vertical-align: sub
        }

        .stats-icon {
            align-items: center;
            background-color: #000;
            border-radius: .5rem;
            display: flex;
            float: right;
            height: 3rem;
            justify-content: center;
            width: 3rem
        }

        .stats-icon i {
            color: #fff;
            font-size: 1.7rem
        }

        .stats-icon.purple {
            background-color: #9694ff
        }

        .stats-icon.blue {
            background-color: #57caeb
        }

        .stats-icon.red {
            background-color: #ff7976
        }

        .stats-icon.green {
            background-color: #5ddab4
        }

        @media (max-width:767px) {
            .stats-icon {
                float: left;
                margin-bottom: .4rem
            }
        }

        .burger-btn {
            display: none
        }

        #main {
            margin-left: 300px;
            padding: 2rem
        }

        @media screen and (max-width:1199px) {
            #main {
                margin-left: 0
            }
        }

        #main.layout-navbar {
            padding: 0
        }

        #main.layout-horizontal {
            margin: 0;
            padding: 0
        }

        #main #main-content {
            padding: 2rem
        }

        .page-heading {
            margin: 0 0 2rem
        }

        .page-heading h3 {
            font-weight: 700
        }

        .page-title-headings {
            align-items: center;
            display: flex;
            justify-content: space-between;
            margin-bottom: .5rem
        }

        .page-title-headings h3 {
            margin-bottom: 0;
            margin-right: 1rem
        }

        .page-title-headings .breadcrumb {
            margin-bottom: 0
        }

        a {
            text-decoration: none
        }

        .mt-10 {
            margin-top: 3rem
        }

        .mb-10,
        .my-10 {
            margin-bottom: 3rem
        }

        .my-10 {
            margin-top: 3rem
        }

        .mb-24,
        .my-24 {
            margin-bottom: 6rem
        }

        .my-24 {
            margin-top: 6rem
        }

        .opacity-50 {
            opacity: 50%
        }

        .py-4-5 {
            padding-bottom: 2rem !important;
            padding-top: 2rem !important
        }

        .text-sm {
            font-size: .875rem
        }

        .text-xl {
            font-size: 1.25rem
        }

        .text-4xl {
            font-size: 2.25rem
        }

        .text-6xl {
            font-size: 4rem
        }

        .text-black {
            color: #000
        }

        .bg-gradient-ltr {
            background: linear-gradient(90deg, #095cde, #53c3f3)
        }

        .bg-light-primary {
            background-color: #ebf3ff;
            color: #002152
        }

        .bg-light-secondary {
            background-color: #e6eaee;
            color: #181e24
        }

        .bg-light-success {
            background-color: #d2ffe8;
            color: #00391c
        }

        .bg-light-danger {
            background-color: #ffdede;
            color: #450000
        }

        .bg-light-warning {
            background-color: #fffdd8;
            color: #3f3c00
        }

        .bg-light-info {
            background-color: #e6fdff;
            color: #00474d
        }

        .font-semibold {
            font-weight: 600
        }

        .font-bold {
            font-weight: 700
        }

        .font-extrabold {
            font-weight: 800
        }

        .text-width-md {
            max-width: 450px
        }

        .text-gray-300 {
            color: #dee2e6 !important
        }

        .text-gray-400 {
            color: #ced4da !important
        }

        .text-gray-500 {
            color: #adb5bd !important
        }

        .text-gray-600 {
            color: #6c757d !important
        }

        .btn-xl {
            padding: 1rem 2rem
        }

        .icon-mid:before {
            vertical-align: middle
        }

        body {
            background-color: #fff
        }

        #auth {
            height: 100vh;
            overflow-x: hidden
        }

        #auth #auth-right {
            background: url(../../images/bg/4853433.jpg), linear-gradient(90deg, #2d499d, #3f5491);
            height: 100%
        }

        #auth #auth-left {
            padding: 5rem 8rem
        }

        #auth #auth-left .auth-title {
            font-size: 4rem;
            margin-bottom: 1rem
        }

        #auth #auth-left .auth-subtitle {
            color: #a8aebb;
            font-size: 1.7rem;
            line-height: 2.5rem
        }

        #auth #auth-left .auth-logo {
            margin-bottom: 7rem
        }

        #auth #auth-left .auth-logo img {
            height: 2rem
        }

        @media screen and (max-width:767px) {
            #auth #auth-left {
                padding: 5rem
            }
        }

        @media screen and (max-width:576px) {
            #auth #auth-left {
                padding: 5rem 3rem
            }
        }
    </style>
</head>

<body>
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <h2>
                            <strong>
                                Sales App
                            </strong>
                        </h2>
                    </div>
                    <h1 class="auth-title">Login</h1>

                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger alert-dismissible fade show" role="alert"> {{ $error }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endforeach

                    <form method="POST" action="login">
                        @csrf
                        <div class="form-group position-relative mb-4">
                            <input type="hidden" id="token-web" name="token_web">
                            <input type="email" name="email" type="email" class="form-control form-control-xl"
                                placeholder="Email" required>
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="form-group position-relative mb-4">
                            <div class="input-group mb-3">
                                <input type="password" name="password" id="password"
                                    class="form-control form-control-xl" placeholder="Password" required>
                                <span class="input-group-text" id="togglePassword"><i
                                        class="fa fa-eye-slash"></i></span>
                            </div>

                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg">Log in</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    <script src="https://www.gstatic.com/firebasejs/8.10.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.10.1/firebase-messaging.js"></script>
    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');
        togglePassword.addEventListener('click', function(e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye slash icon
            var child = this.children[0];
            if (type == "text") {
                child.classList.add('fa-eye');
                child.classList.remove('fa-eye-slash');
            } else {
                child.classList.add('fa-eye-slash');
                child.classList.remove('fa-eye');
            }
        });
    </script>

</body>

</html>
