
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'StudySpace') | StudySpace</title>

    <meta name="theme-color" content="#52796F">

    <style>
        /* ==============================
           GLOBAL STYLE
        ============================== */

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            background: #F7F9F6;
            color: #26332F;
            font-family: Inter, -apple-system, BlinkMacSystemFont,
                         "Segoe UI", sans-serif;
            font-size: 15px;
            line-height: 1.6;
        }

        a {
            color: #52796F;
        }

        h1, h2, h3, h4 {
            color: #26332F;
            line-height: 1.3;
        }

        .container {
            width: calc(100% - 40px);
            max-width: 1150px;
            margin: 35px auto;
            padding: 25px;
            background: #FFFFFF;
            border: 1px solid #E7ECE8;
            border-radius: 20px;
            box-shadow: 0 5px 25px rgba(53, 79, 82, 0.05);
        }

        main {
            min-height: 350px;
        }

        /* ==============================
           NAVIGATION
        ============================== */

        .nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 20px;
            min-height: 76px;
            padding: 14px 24px;
            background: #FFFFFF;
            border: 1px solid #E7ECE8;
            border-radius: 16px;
            box-shadow: 0 3px 12px rgba(53, 79, 82, 0.04);
        }

        .brand {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            color: #354F52;
            text-decoration: none;
        }

        .brand:hover {
            color: #52796F;
        }

        .brand-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 38px;
            height: 38px;
            color: white;
            background: #52796F;
            border-radius: 11px;
            font-size: 19px;
            font-weight: 800;
        }

        .brand-name {
            font-size: 19px;
            font-weight: 750;
            letter-spacing: -0.6px;
        }

        .nav-links {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 8px;
        }

        .nav-links a,
        .nav-user a {
            padding: 9px 13px;
            color: #84918A;
            border-radius: 9px;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            transition: 0.2s ease;
        }

        .nav-links a:hover,
        .nav-user a:hover {
            color: #52796F;
            background: #F1F6F2;
        }

        .nav-links a.active {
            color: #354F52;
            background: #EAF1EC;
        }

        .nav-user {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
        }

        .user-greeting {
            color: #84918A;
            font-size: 13px;
            font-weight: 600;
        }

        .btn-register {
            padding: 10px 17px !important;
            color: white !important;
            background: #52796F;
            border-radius: 9px;
        }

        .btn-register:hover {
            color: white !important;
            background: #354F52 !important;
        }

        .btn-logout {
            padding: 9px 15px;
            color: #354F52;
            background: #EDF3EF;
            border: 1px solid #DCE8DF;
            border-radius: 9px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
        }

        .btn-logout:hover {
            color: white;
            background: #354F52;
            border-color: #354F52;
        }

        .inline {
            display: inline;
        }

        /* ==============================
           GENERAL COMPONENTS
        ============================== */

        .card {
            margin-top: 20px;
            padding: 24px;
            background: #FFFFFF;
            border: 1px solid #E7ECE8;
            border-radius: 14px;
            box-shadow: 0 3px 12px rgba(53, 79, 82, 0.04);
        }

        .muted {
            color: #84918A;
            font-size: 13px;
        }

        button,
        input,
        textarea,
        select {
            font: inherit;
        }

        button {
            cursor: pointer;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 11px 13px;
            color: #26332F;
            background: #FFFFFF;
            border: 1px solid #DCE5DE;
            border-radius: 9px;
        }

        input:focus,
        textarea:focus,
        select:focus {
            outline: 2px solid #CADBD2;
            border-color: #52796F;
        }

        button:not(.btn-logout) {
            border-radius: 9px;
        }

        .flash {
            margin: 15px 0;
            padding: 13px 16px;
            color: #354F52;
            background: #EAF1EC;
            border-radius: 9px;
        }

        .error {
            color: #B54747;
            font-size: 13px;
        }

        /* ==============================
           FOOTER
        ============================== */

        footer {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #E7ECE8;
            text-align: center;
        }

        footer p {
            color: #98A39C;
            font-size: 12px;
        }

        /* ==============================
           STUDYSPACE HOME PAGE
        ============================== */

        .hero-section {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 30px;
            min-height: 300px;
            margin-top: 28px;
            padding: 45px;
            background: linear-gradient(120deg, #EAF1EC, #F4F7F2);
            border: 1px solid #DFE9E1;
            border-radius: 20px;
            overflow: hidden;
        }

        .hero-content {
            max-width: 560px;
        }

        .hero-label,
        .section-eyebrow {
            color: #52796F;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 1.5px;
        }

        .hero-content h1 {
            margin: 16px 0;
            color: #26332F;
            font-size: clamp(30px, 4vw, 43px);
            line-height: 1.2;
            letter-spacing: -1.5px;
        }

        .hero-content h1 span {
            color: #52796F;
        }

        .hero-content p {
            max-width: 480px;
            color: #68766F;
            line-height: 1.8;
        }

        .btn-primary {
            display: inline-block;
            margin-top: 12px;
            padding: 12px 20px;
            color: white !important;
            background: #52796F;
            border-radius: 9px;
            font-size: 14px;
            font-weight: 650;
            text-decoration: none;
            transition: 0.2s ease;
        }

        .btn-primary:hover {
            background: #354F52;
            transform: translateY(-2px);
        }

        .hero-decoration {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            min-width: 230px;
            min-height: 190px;
        }

        .hero-icon {
            position: absolute;
            top: -15px;
            right: 15px;
            color: #A2B9A9;
            font-size: 85px;
        }

        .hero-note {
            z-index: 1;
            width: 220px;
            padding: 25px;
            background: white;
            border: 1px solid #E1EAE3;
            border-radius: 16px;
            box-shadow: 0 12px 30px rgba(53, 79, 82, 0.09);
            transform: rotate(3deg);
        }

        .hero-note span {
            color: #789187;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 1px;
        }

        .hero-note strong {
            display: block;
            margin-top: 14px;
            color: #354F52;
            font-size: 17px;
        }

        .hero-note p {
            margin-bottom: 0;
            color: #84918A;
            font-size: 12px;
        }

        .welcome-section {
            margin: 35px 0 30px;
        }

        .welcome-section h2,
        .section-heading h2 {
            margin: 8px 0;
            color: #26332F;
            font-size: 25px;
        }

        .welcome-section p,
        .section-heading p {
            margin: 0;
            color: #84918A;
            font-size: 14px;
        }

        .section-heading {
            display: flex;
            align-items: end;
            justify-content: space-between;
            gap: 15px;
            margin-bottom: 22px;
        }

        .text-link,
        .read-link {
            color: #52796F;
            font-size: 13px;
            font-weight: 700;
            text-decoration: none;
        }

        .text-link:hover,
        .read-link:hover {
            color: #354F52;
        }

        .materials-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 22px;
        }

        .material-card {
            overflow: hidden;
            background: white;
            border: 1px solid #E7ECE8;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(53, 79, 82, 0.04);
            transition: 0.2s ease;
        }

        .material-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 25px rgba(53, 79, 82, 0.09);
        }

        .material-image {
            display: block;
            height: 180px;
            overflow: hidden;
            background: #EAF1EC;
        }

        .material-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .material-content {
            padding: 20px;
        }

        .material-category {
            color: #789187;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 1px;
        }

        .material-content h3 {
            margin: 10px 0;
            font-size: 18px;
            line-height: 1.4;
        }

        .material-content h3 a {
            color: #354F52;
            text-decoration: none;
        }

        .material-description {
            min-height: 45px;
            color: #7B8981;
            font-size: 13px;
            line-height: 1.7;
        }

        .material-meta {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 8px;
            margin: 16px 0;
            padding-top: 13px;
            border-top: 1px solid #EDF1ED;
            color: #8A968F;
            font-size: 11px;
        }

        .read-link {
            display: inline-block;
        }

        .empty-state {
            padding: 45px 20px;
            text-align: center;
            background: white;
            border: 1px dashed #CBD9CE;
            border-radius: 15px;
        }

        .empty-icon {
            color: #789187;
            font-size: 35px;
        }

        .empty-state h3 {
            margin: 10px 0;
            color: #354F52;
        }

        .empty-state p {
            color: #84918A;
            font-size: 13px;
        }

        /* ==============================
           RESPONSIVE
        ============================== */

        @media (max-width: 700px) {
            .container {
                width: calc(100% - 20px);
                margin: 10px auto;
                padding: 14px;
            }

            .nav {
                justify-content: flex-start;
                gap: 14px;
                padding: 14px;
            }

            .nav-links {
                order: 3;
                width: 100%;
            }

            .nav-user {
                margin-left: auto;
            }

            .user-greeting {
                display: none;
            }

            .hero-section {
                padding: 28px;
            }

            .hero-decoration {
                display: none;
            }

            .materials-grid {
                grid-template-columns: 1fr;
            }

            .section-heading {
                align-items: start;
            }
        }

/* ==============================
   MY NOTES PAGE
============================== */

.notes-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
    margin: 35px 0;
    padding: 30px;
    background: #F1F6F2;
    border: 1px solid #E1EAE3;
    border-radius: 16px;
}

.notes-header h1 {
    margin: 8px 0;
    color: #354F52;
    font-size: 30px;
}

.notes-header p {
    margin: 0;
    color: #84918A;
    font-size: 14px;
}

.notes-section {
    margin-top: 30px;
}

.notes-count {
    padding: 8px 13px;
    color: #52796F;
    background: #EAF1EC;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 700;
    white-space: nowrap;
}

.notes-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 22px;
}

.note-card {
    overflow: hidden;
    background: white;
    border: 1px solid #E7ECE8;
    border-radius: 15px;
    box-shadow: 0 4px 15px rgba(53, 79, 82, 0.04);
    transition: 0.2s ease;
}

.note-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 10px 25px rgba(53, 79, 82, 0.09);
}

.note-image {
    display: block;
    height: 175px;
    overflow: hidden;
    background: #EAF1EC;
}

.note-image img {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.note-content {
    padding: 20px;
}

.note-label {
    color: #789187;
    font-size: 10px;
    font-weight: 800;
    letter-spacing: 1px;
}

.note-content h3 {
    margin: 10px 0;
    font-size: 18px;
}

.note-content h3 a {
    color: #354F52;
    text-decoration: none;
}

.note-description {
    min-height: 44px;
    color: #84918A;
    font-size: 13px;
    line-height: 1.7;
}

.note-information {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 8px;
    margin: 15px 0;
    padding-top: 13px;
    border-top: 1px solid #EDF1ED;
    color: #8A968F;
    font-size: 11px;
}

.note-actions {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 12px;
}

.note-view {
    color: #52796F;
    font-size: 13px;
    font-weight: 700;
    text-decoration: none;
}

.note-owner-actions {
    display: flex;
    align-items: center;
    gap: 12px;
}

.note-edit,
.note-delete {
    padding: 7px 11px;
    border-radius: 7px;
    font-size: 12px;
    font-weight: 600;
    text-decoration: none;
}

.note-edit {
    color: #52796F;
    background: #EAF1EC;
}

.note-delete {
    color: #B54747;
    background: #FBEFEE;
    border: none;
}

.note-pagination {
    margin-top: 25px;
}

.notes-pagination {
    margin-top: 25px;
}

@media (max-width: 700px) {
    .notes-header {
        align-items: flex-start;
        flex-direction: column;
    }

    .notes-grid {
        grid-template-columns: 1fr;
    }
}


/* ==============================
   CREATE NOTE PAGE
============================== */

.create-note-header {
    margin: 35px 0 25px;
}

.create-note-header h1 {
    margin: 9px 0;
    color: #354F52;
    font-size: 30px;
}

.create-note-header p {
    margin: 0;
    color: #84918A;
    font-size: 14px;
}

.create-note-card {
    max-width: 800px;
    margin: 0 auto 35px;
    padding: 30px;
    background: #FFFFFF;
    border: 1px solid #E7ECE8;
    border-radius: 16px;
    box-shadow: 0 4px 18px rgba(53, 79, 82, 0.05);
}

.form-heading {
    display: flex;
    align-items: center;
    gap: 15px;
    margin-bottom: 28px;
    padding-bottom: 20px;
    border-bottom: 1px solid #EDF1ED;
}

.form-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 45px;
    height: 45px;
    color: #52796F;
    background: #EAF1EC;
    border-radius: 12px;
    font-size: 23px;
}

.form-heading h2 {
    margin: 0 0 4px;
    color: #354F52;
    font-size: 19px;
}

.form-heading p {
    margin: 0;
    color: #84918A;
    font-size: 13px;
}

.form-group {
    margin-bottom: 23px;
}

.form-group label {
    display: block;
    margin-bottom: 9px;
    color: #354F52;
    font-size: 14px;
    font-weight: 700;
}

.form-group label span {
    color: #98A39C;
    font-size: 12px;
    font-weight: 400;
}

.form-group input,
.form-group textarea {
    width: 100%;
    padding: 13px 15px;
    color: #26332F;
    background: #FAFCFA;
    border: 1px solid #DCE5DE;
    border-radius: 10px;
    font-family: inherit;
    font-size: 14px;
    transition: 0.2s ease;
}

.form-group input:focus,
.form-group textarea:focus {
    outline: none;
    background: #FFFFFF;
    border-color: #52796F;
    box-shadow: 0 0 0 3px rgba(82, 121, 111, 0.10);
}

.form-group textarea {
    display: block;
    width: 100%;
    max-width: 100%;
    min-height: 180px;
    box-sizing: border-box;
    padding: 13px 15px;
    resize: vertical;
    line-height: 1.8;
    overflow-wrap: break-word;
}

.form-group input::placeholder,
.form-group textarea::placeholder {
    color: #ADB8B0;
}

.field-hint {
    display: block;
    margin-top: 7px;
    color: #98A39C;
    font-size: 11px;
    line-height: 1.6;
}

.field-error {
    display: block;
    margin-top: 6px;
    color: #B54747;
    font-size: 12px;
}

.form-error {
    margin-bottom: 22px;
    padding: 15px;
    color: #A33D3D;
    background: #FBEFEE;
    border: 1px solid #F2D8D5;
    border-radius: 10px;
    font-size: 13px;
}

.form-error ul {
    margin: 8px 0 0;
    padding-left: 20px;
}

.form-actions {
    display: flex;
    justify-content: flex-end;
    align-items: center;
    gap: 12px;
    margin-top: 30px;
    padding-top: 20px;
    border-top: 1px solid #EDF1ED;
}

.btn-cancel {
    display: inline-block;
    padding: 11px 19px;
    color: #68766F;
    background: #F1F4F1;
    border-radius: 9px;
    font-size: 13px;
    font-weight: 600;
    text-decoration: none;
}

.btn-save {
    padding: 12px 20px;
    color: #FFFFFF;
    background: #52796F;
    border: none;
    border-radius: 9px;
    font-size: 13px;
    font-weight: 700;
    transition: 0.2s ease;
}

.btn-save:hover {
    background: #354F52;
    transform: translateY(-2px);
}

@media (max-width: 600px) {
    .create-note-card {
        padding: 20px;
    }

    .form-actions {
        flex-direction: column-reverse;
        align-items: stretch;
    }

    .btn-cancel,
    .btn-save {
        width: 100%;
        text-align: center;
    }
}


/* EDIT NOTE IMAGE PREVIEW */

.image-preview-section {
    margin-bottom: 24px;
}

.image-preview-section label {
    display: block;
    margin-bottom: 10px;
    color: #354F52;
    font-size: 14px;
    font-weight: 700;
}

.edit-image-preview {
    display: block;
    width: 100%;
    max-width: 420px;
    height: 220px;
    object-fit: cover;
    background: #EAF1EC;
    border: 1px solid #E1EAE3;
    border-radius: 12px;
}


/* =================================
   DETAIL NOTE - STUDYSPACE
================================= */

.detail-note {
    max-width: 900px;
    margin: 10px auto;
    padding: 10px 5px 25px;
}

.detail-note-header {
    margin-bottom: 28px;
}

.detail-note-header h1 {
    margin: 12px 0 16px;
    color: #26332F;
    font-size: 34px;
    line-height: 1.3;
    font-weight: 750;
    overflow-wrap: anywhere;
}

.detail-note-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    color: #718078;
    font-size: 14px;
}

.detail-note-meta span {
    display: inline-flex;
    align-items: center;
    gap: 7px;
}

.meta-icon {
    color: #52796F;
}

.detail-note-image {
    width: 100%;
    margin-bottom: 32px;
    overflow: hidden;
    background: #EAF1EC;
    border-radius: 18px;
}

.detail-note-image img {
    display: block;
    width: 100%;
    max-height: 440px;
    object-fit: cover;
}

.detail-note-content {
    padding: 28px;
    background: #FFFFFF;
    border: 1px solid #E5ECE7;
    border-radius: 16px;
}

.detail-content-heading {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 20px;
    padding-bottom: 16px;
    border-bottom: 1px solid #E8EEE9;
}

.detail-content-heading h2 {
    margin: 0;
    color: #354F52;
    font-size: 20px;
}

.detail-content-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 38px;
    height: 38px;
    color: #52796F;
    background: #EAF1EC;
    border-radius: 10px;
}

.detail-note-body {
    color: #45554D;
    font-size: 15px;
    line-height: 1.9;
    overflow-wrap: anywhere;
}

.detail-note-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 14px;
    margin-top: 28px;
}

.detail-footer-actions {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 10px;
}

.btn-secondary {
    display: inline-block;
    padding: 11px 18px;
    color: #52796F;
    background: #EAF1EC;
    border: 1px solid #DCE8DF;
    border-radius: 9px;
    font-size: 14px;
    font-weight: 650;
    text-decoration: none;
}

.btn-secondary:hover {
    background: #DCE8DF;
}

@media (max-width: 600px) {
    .detail-note {
        padding: 5px 0 20px;
    }

    .detail-note-header h1 {
        font-size: 27px;
    }

    .detail-note-content {
        padding: 20px;
    }

    .detail-note-image img {
        max-height: 260px;
    }

    .detail-note-footer {
        align-items: stretch;
        flex-direction: column;
    }

    .detail-footer-actions {
        width: 100%;
    }
}


/* =================================
   DASHBOARD - STUDYSPACE
================================= */

.dashboard-welcome {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 24px;
    padding: 35px;
    margin-bottom: 28px;
    background: linear-gradient(120deg, #EAF1EC, #F4F7F3);
    border: 1px solid #DFE9E1;
    border-radius: 18px;
}

.dashboard-welcome h1 {
    margin: 12px 0;
    color: #354F52;
    font-size: 30px;
    font-weight: 750;
}

.dashboard-welcome p {
    max-width: 580px;
    margin: 0;
    color: #718078;
    line-height: 1.7;
}

.dashboard-welcome-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    width: 85px;
    height: 85px;
    color: white;
    background: #52796F;
    border-radius: 24px;
    font-size: 42px;
    font-weight: 750;
}

.dashboard-stats {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 18px;
    margin-bottom: 35px;
}

.dashboard-stat-card {
    display: flex;
    align-items: center;
    gap: 18px;
    padding: 24px;
    background: white;
    border: 1px solid #E5ECE7;
    border-radius: 15px;
}

.stat-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    width: 54px;
    height: 54px;
    color: #52796F;
    background: #EAF1EC;
    border-radius: 13px;
    font-size: 25px;
}

.stat-label {
    margin: 0 0 5px;
    color: #718078;
    font-size: 14px;
}

.dashboard-stat-card h2 {
    margin: 0 0 5px;
    color: #354F52;
    font-size: 29px;
}

.dashboard-stat-card span {
    color: #89958E;
    font-size: 12px;
}

.dashboard-section {
    margin-bottom: 35px;
}

.dashboard-section-heading {
    margin-bottom: 18px;
}

.dashboard-section-heading h2 {
    margin: 7px 0 5px;
    color: #354F52;
    font-size: 22px;
}

.dashboard-section-heading p {
    margin: 0;
    color: #89958E;
    font-size: 14px;
}

.quick-action-grid {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 15px;
}

.quick-action-card {
    display: flex;
    align-items: center;
    gap: 13px;
    padding: 19px;
    background: white;
    border: 1px solid #E5ECE7;
    border-radius: 14px;
    text-decoration: none;
    transition: .2s ease;
}

.quick-action-card:hover {
    border-color: #A9C2B3;
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(53, 79, 82, .07);
}

.quick-action-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    width: 43px;
    height: 43px;
    color: #52796F;
    background: #EAF1EC;
    border-radius: 11px;
    font-size: 23px;
}

.quick-action-card h3 {
    margin: 0 0 5px;
    color: #354F52;
    font-size: 14px;
}

.quick-action-card p {
    margin: 0;
    color: #89958E;
    font-size: 12px;
    line-height: 1.5;
}

.quick-action-arrow {
    margin-left: auto;
    color: #52796F;
    font-size: 19px;
}

.dashboard-latest-heading {
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
    gap: 15px;
}

.dashboard-view-all {
    color: #52796F;
    font-size: 13px;
    font-weight: 700;
    text-decoration: none;
}

.dashboard-view-all:hover {
    color: #354F52;
}

.dashboard-latest-list {
    display: flex;
    flex-direction: column;
    gap: 13px;
}

.dashboard-latest-card {
    display: flex;
    align-items: center;
    gap: 18px;
    padding: 17px;
    background: white;
    border: 1px solid #E5ECE7;
    border-radius: 14px;
}

.dashboard-latest-image {
    display: block;
    flex-shrink: 0;
    width: 125px;
    height: 95px;
    overflow: hidden;
    background: #EAF1EC;
    border-radius: 10px;
}

.dashboard-latest-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.dashboard-latest-content {
    flex: 1;
    min-width: 0;
}

.dashboard-latest-content h3 {
    margin: 7px 0;
    font-size: 16px;
}

.dashboard-latest-content h3 a {
    color: #354F52;
    text-decoration: none;
}

.dashboard-latest-content h3 a:hover {
    color: #52796F;
}

.dashboard-latest-content > p {
    margin: 0 0 9px;
    color: #718078;
    font-size: 13px;
    line-height: 1.5;
}

.dashboard-latest-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    color: #89958E;
    font-size: 12px;
}

.dashboard-open-note {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    width: 35px;
    height: 35px;
    color: #52796F;
    background: #EAF1EC;
    border-radius: 50%;
    text-decoration: none;
}

.dashboard-empty {
    padding: 40px 20px;
    text-align: center;
    background: white;
    border: 1px dashed #C9D9CD;
    border-radius: 15px;
}

.dashboard-empty h3 {
    color: #354F52;
}

.dashboard-empty p {
    margin-bottom: 20px;
    color: #89958E;
    font-size: 14px;
}

.dashboard-account {
    padding: 25px;
    background: white;
    border: 1px solid #E5ECE7;
    border-radius: 16px;
}

.dashboard-account-heading {
    display: flex;
    align-items: center;
    gap: 15px;
    padding-bottom: 20px;
    border-bottom: 1px solid #E8EEE9;
}

.account-avatar {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    width: 52px;
    height: 52px;
    color: white;
    background: #52796F;
    border-radius: 50%;
    font-size: 22px;
    font-weight: 700;
}

.dashboard-account-heading h2 {
    margin: 5px 0;
    color: #354F52;
    font-size: 19px;
}

.dashboard-account-heading p {
    margin: 0;
    color: #89958E;
    font-size: 13px;
}

.account-details {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 20px;
    padding-top: 20px;
}

.account-details div {
    display: flex;
    flex-direction: column;
    gap: 7px;
}

.account-details span {
    color: #89958E;
    font-size: 12px;
}

.account-details strong {
    color: #354F52;
    font-size: 14px;
    overflow-wrap: anywhere;
}

@media (max-width: 750px) {
    .quick-action-grid {
        grid-template-columns: 1fr;
    }

    .dashboard-stats {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 550px) {
    .dashboard-welcome {
        padding: 23px;
    }

    .dashboard-welcome h1 {
        font-size: 24px;
    }

    .dashboard-welcome-icon {
        width: 55px;
        height: 55px;
        border-radius: 15px;
        font-size: 28px;
    }

    .dashboard-latest-card {
        align-items: flex-start;
        gap: 12px;
        padding: 12px;
    }

    .dashboard-latest-image {
        width: 85px;
        height: 80px;
    }

    .dashboard-open-note {
        display: none;
    }

    .account-details {
        grid-template-columns: 1fr;
    }

    .dashboard-account {
        padding: 19px;
    }
}


/* =================================
   AUTHENTICATION - STUDYSPACE
================================= */

.auth-page {
    max-width: 520px;
    margin: 25px auto;
    padding: 15px 0;
}

.auth-card {
    padding: 38px;
    background: #FFFFFF;
    border: 1px solid #E5ECE7;
    border-radius: 20px;
    box-shadow: 0 10px 35px rgba(53, 79, 82, .05);
}

.auth-brand {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    margin-bottom: 32px;
    color: #354F52;
    font-size: 21px;
    font-weight: 750;
}

.auth-logo {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 42px;
    height: 42px;
    color: white;
    background: #52796F;
    border-radius: 12px;
    font-size: 23px;
}

.auth-heading {
    margin-bottom: 27px;
    text-align: center;
}

.auth-heading h1 {
    margin: 10px 0;
    color: #354F52;
    font-size: 27px;
    font-weight: 750;
}

.auth-heading p {
    margin: 0;
    color: #89958E;
    font-size: 14px;
    line-height: 1.7;
}

.auth-form-group {
    margin-bottom: 20px;
}

.auth-form-group label {
    display: block;
    margin-bottom: 9px;
    color: #354F52;
    font-size: 14px;
    font-weight: 650;
}

.auth-form-group input {
    width: 100%;
    box-sizing: border-box;
    padding: 13px 15px;
    color: #26332F;
    background: #FAFCFA;
    border: 1px solid #DCE6DF;
    border-radius: 10px;
    outline: none;
    font-size: 14px;
}

.auth-form-group input:focus {
    border-color: #52796F;
    box-shadow: 0 0 0 3px rgba(82, 121, 111, .10);
}

.auth-remember {
    margin: 3px 0 23px;
}

.auth-remember label {
    display: inline-flex;
    align-items: center;
    gap: 9px;
    color: #718078;
    font-size: 13px;
    cursor: pointer;
}

.auth-remember input {
    width: 16px;
    height: 16px;
    accent-color: #52796F;
}

.auth-submit {
    width: 100%;
    padding: 14px;
    color: white;
    background: #52796F;
    border: none;
    border-radius: 10px;
    font-size: 15px;
    font-weight: 700;
    cursor: pointer;
    transition: .2s ease;
}

.auth-submit:hover {
    background: #354F52;
}

.auth-divider {
    display: flex;
    align-items: center;
    gap: 12px;
    margin: 25px 0 18px;
    color: #89958E;
    font-size: 13px;
}

.auth-divider::before,
.auth-divider::after {
    content: "";
    flex: 1;
    height: 1px;
    background: #E5ECE7;
}

.auth-register-link {
    display: block;
    padding: 12px;
    color: #52796F;
    background: #EAF1EC;
    border: 1px solid #DCE8DF;
    border-radius: 10px;
    text-align: center;
    font-size: 14px;
    font-weight: 700;
    text-decoration: none;
}

.auth-register-link:hover {
    background: #DCE8DF;
}

.auth-error {
    margin-bottom: 20px;
    padding: 12px 15px;
    color: #A33D3D;
    background: #FFF1F0;
    border: 1px solid #F3D1CE;
    border-radius: 10px;
    font-size: 13px;
}

.auth-error p {
    margin: 3px 0;
}

.auth-footer {
    margin-top: 22px;
    color: #89958E;
    font-size: 12px;
    text-align: center;
}

@media (max-width: 550px) {
    .auth-page {
        padding: 5px 0;
    }

    .auth-card {
        padding: 25px 20px;
    }

    .auth-heading h1 {
        font-size: 23px;
    }
}


/* =================================
   NAVBAR REFINEMENT - STUDYSPACE
================================= */

.nav {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 15px;
    padding: 18px 25px;
}

.brand {
    display: flex;
    align-items: center;
    gap: 10px;
    text-decoration: none;
}

.brand-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    color: white;
    background: #52796F;
    border-radius: 11px;
    font-size: 21px;
    font-weight: 750;
}

.brand-name {
    color: #354F52;
    font-size: 20px;
    font-weight: 750;
}

.nav-links {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 8px;
}

.nav-links a,
.nav-user > a:not(.btn-register) {
    padding: 9px 13px;
    color: #718078;
    border-radius: 8px;
    font-size: 14px;
    font-weight: 600;
    text-decoration: none;
    transition: .2s ease;
}

.nav-links a:hover,
.nav-user > a:not(.btn-register):hover,
.nav-links a.active,
.nav-user > a.active {
    color: #354F52;
    background: #EAF1EC;
}

.nav-user {
    display: flex;
    align-items: center;
    gap: 12px;
}

.user-greeting {
    color: #718078;
    font-size: 13px;
    font-weight: 600;
}

.btn-logout {
    padding: 9px 15px;
    color: #52796F;
    background: #EAF1EC;
    border: 1px solid #DCE8DF;
    border-radius: 8px;
    font-size: 13px;
    font-weight: 700;
    cursor: pointer;
}

.btn-logout:hover {
    color: white;
    background: #52796F;
}

.btn-register {
    padding: 10px 17px;
    color: white;
    background: #52796F;
    border-radius: 9px;
    font-size: 13px;
    font-weight: 700;
    text-decoration: none;
}

.btn-register:hover {
    background: #354F52;
}

@media (max-width: 700px) {
    .nav {
        justify-content: center;
        padding: 16px;
    }

    .nav-links {
        justify-content: center;
        width: 100%;
    }

    .nav-user {
        justify-content: center;
        width: 100%;
        flex-wrap: wrap;
    }
}

/* =================================
   FOOTER - STUDYSPACE
================================= */

footer {
    margin-top: 55px;
    padding: 25px 20px;
    text-align: center;
    background: #F7F9F6;
    border-top: 1px solid #E5ECE7;
}

footer p {
    margin: 0;
    color: #82918A;
    font-size: 13px;
    line-height: 1.7;
    font-weight: 500;
}

@media (max-width: 600px) {
    footer {
        margin-top: 35px;
        padding: 20px 15px;
    }

    footer p {
        font-size: 12px;
    }
}

/* =================================
   FIX PAGINATION - STUDYSPACE
================================= */

.notes-pagination {
    margin-top: 25px;
    margin-bottom: 25px;
    display: flex;
    justify-content: center;
    width: 100%;
}

.notes-pagination svg {
    display: none !important;
}

.notes-pagination nav {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    gap: 5px;
}

.notes-pagination nav span,
.notes-pagination nav a {
    font-size: 13px !important;
    line-height: 1.5 !important;
}

.notes-pagination nav a {
    text-decoration: none;
}

.notes-pagination nav p {
    margin: 0;
}

.notes-pagination nav svg {
    display: none !important;
}
  

/* Upload Image - StudySpace */
.form-group input[type="file"] {
    width: 100%;
    padding: 12px 14px;
    background: #F9FBF9;
    border: 1.5px solid #D9E5DE;
    border-radius: 10px;
    color: #52645B;
    font-family: inherit;
    font-size: 13px;
    cursor: pointer;
}

.form-group input[type="file"]::file-selector-button {
    padding: 9px 15px;
    margin-right: 12px;
    border: none;
    border-radius: 7px;
    background: #E8F0EB;
    color: #354F52;
    font-weight: 600;
    cursor: pointer;
}

.form-group input[type="file"]::file-selector-button:hover {
    background: #CADBD2;
}


/* IMAGE UPLOAD AREA */
.upload-area {
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 250px;
    padding: 25px;
    border: 2px dashed #C5DDD0;
    border-radius: 18px;
    background: #FCFEFC;
    cursor: pointer;
    transition: all 0.25s ease;
}

.upload-area:hover,
.upload-area.drag-over {
    border-color: #35B875;
    background: #F3FAF5;
}

.upload-area input[type="file"] {
    display: none;
}

.upload-content {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 15px;
    text-align: center;
}

.upload-icon {
    width: 62px;
    height: 62px;
    color: #35B875;
}

.upload-content strong {
    color: #299D60;
    font-size: 18px;
    font-weight: 700;
}

.upload-content span {
    color: #74817A;
    font-size: 14px;
}

.upload-area + .field-hint {
    display: block;
    margin-top: 12px;
}

@media (max-width: 600px) {
    .upload-area {
        min-height: 200px;
        padding: 20px;
    }

    .upload-content strong {
        font-size: 16px;
    }

    .upload-content span {
        font-size: 12px;
    }
}

  </style>
</head>

<body>
    <div class="container">

        @include('partials.nav')

        <main>
            @yield('content')
        </main>

        <footer>
            <p>
                © 2026 StudySpace.
                A little progress every day makes a big difference.
            </p>
        </footer>

    </div>
</body>
</html>
