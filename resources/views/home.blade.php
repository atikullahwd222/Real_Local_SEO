<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Domain Duplicate Checker</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-color: #4f46e5;
            --secondary-color: #818cf8;
            --success-color: #10b981;
            --warning-color: #f59e0b;
            --background-color: #f8fafc;
            --card-background: #ffffff;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--background-color);
            color: #1f2937;
        }

        .page-title {
            color: var(--primary-color);
            font-weight: 700;
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
        }

        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
            background: var(--card-background);
            transition: all 0.3s cubic-bezier(.25,.8,.25,1);
        }

        .card:hover {
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .card-header {
            background-color: var(--card-background);
            border-bottom: 1px solid rgba(0,0,0,0.08);
            padding: 1rem 1.5rem;
            border-radius: 12px 12px 0 0 !important;
        }

        .card-header h5 {
            font-weight: 600;
            color: var(--primary-color);
            margin: 0;
        }

        .card-body {
            padding: 1.5rem;
        }

        .textarea-container {
            position: relative;
            margin-bottom: 1rem;
        }

        textarea {
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 1rem;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            resize: none;
        }

        textarea:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1) !important;
        }

        .charCount {
            position: absolute;
            bottom: 10px;
            right: 10px;
            font-size: 0.85rem;
            color: #6b7280;
            background: rgba(255,255,255,0.9);
            padding: 2px 8px;
            border-radius: 4px;
        }

        .btn {
            padding: 0.6rem 1.5rem;
            font-weight: 500;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-primary:hover {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
            transform: translateY(-1px);
        }

        .btn-secondary {
            background-color: #e5e7eb;
            border-color: #e5e7eb;
            color: #4b5563;
        }

        .btn-secondary:hover {
            background-color: #d1d5db;
            border-color: #d1d5db;
            color: #374151;
        }

        .duplicate {
            background-color: rgba(239, 68, 68, 0.05);
        }

        .table {
            margin-bottom: 0;
        }

        .table th {
            font-weight: 600;
            color: #374151;
            background-color: #f9fafb;
        }

        .table td {
            vertical-align: middle;
        }

        .output-container {
            position: relative;
            margin-top: 2rem;
        }

        #copyButton {
            position: absolute;
            top: 0;
            right: 0;
            padding: 0.4rem 1rem;
            font-size: 0.875rem;
            border-radius: 6px;
            z-index: 1;
        }

        #outputText {
            background-color: #f8fafc;
            font-family: monospace;
            font-size: 0.9rem;
            min-height: 300px;
            padding: 1.5rem;
        }

        .alert {
            border-radius: 8px;
            border: none;
        }

        .alert-info {
            background-color: rgba(79, 70, 229, 0.1);
            color: var(--primary-color);
        }

        .alert-warning {
            background-color: rgba(245, 158, 11, 0.1);
            color: var(--warning-color);
        }

        .alert-success {
            background-color: rgba(16, 185, 129, 0.1);
            color: var(--success-color);
        }

        .list-group {
            border-radius: 8px;
            overflow: hidden;
        }

        .list-group-item {
            border-left: none;
            border-right: none;
            padding: 1rem 1.5rem;
        }

        .list-group-item:first-child {
            border-top: none;
        }

        .list-group-item:last-child {
            border-bottom: none;
        }

        .list-group-item a {
            color: var(--primary-color);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .list-group-item a:hover {
            color: var(--secondary-color);
        }

        .copyright {
            margin-top: 3rem;
            padding-top: 1.5rem;
            border-top: 1px solid #e5e7eb;
            color: #6b7280;
            font-size: 0.875rem;
            text-align: center;
        }

        .copyright p {
            margin-bottom: 0.5rem;
        }

        .copyright .legal {
            font-size: 0.75rem;
            max-width: 600px;
            margin: 1rem auto;
            line-height: 1.4;
        }

        /* Navigation Styles */
        .navbar {
            padding: 1rem 0;
        }

        .nav-item {
            margin: 0 0.3rem;
        }

        .nav-link {
            padding: 0.5rem 1rem !important;
            border-radius: 8px;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .nav-link:hover {
            background-color: rgba(79, 70, 229, 0.1);
            color: var(--primary-color) !important;
        }

        .nav-link.active {
            background-color: var(--primary-color);
            color: white !important;
        }

        .nav-link i {
            font-size: 1.1rem;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="https://client.baharihost.com/templates/lagom2/assets/img/logo/logo_big.244953714.png" alt="BahariHost Logo" height="40">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('home') }}">
                            <i class="bi bi-intersect me-1"></i>Duplicate URL Checker
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('badsite-checker') }}">
                            <i class="bi bi-shield-check me-1"></i>Bad Site Checker
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('url-protocol') }}">
                            <i class="bi bi-shield-check me-1"></i>URL Protocol (http/https)
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('login') }}">
                            <i class="bi bi-box-arrow-in-right me-1"></i>Login
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container py-5">
        <h1 class="page-title text-center">Domain Duplicate Checker</h1>

        <div class="row g-4">
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-header">
                        <h5><i class="bi bi-list-ul me-2"></i>Active Link</h5>
                    </div>
                    <div class="card-body">
                        <div class="textarea-container">
                            <textarea id="domainList1" class="form-control" rows="10"
                                placeholder="Enter domains (one per line)&#10;Example:&#10;example.com&#10;test.com"></textarea>
                            <span class="charCount" id="charCount1">0 domains</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-header">
                        <h5><i class="bi bi-list-ul me-2"></i>New Link</h5>
                    </div>
                    <div class="card-body">
                        <div class="textarea-container">
                            <textarea id="domainList2" class="form-control" rows="10"
                                placeholder="Enter domains (one per line)&#10;Example:&#10;example.com&#10;test.com"></textarea>
                            <span class="charCount" id="charCount2">0 domains</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12 text-center">
                <button id="checkDuplicates" class="btn btn-primary me-2">
                    <i class="bi bi-search me-2"></i>Check Duplicates
                </button>
                <button id="clearAll" class="btn btn-secondary">
                    <i class="bi bi-trash me-2"></i>Clear All
                </button>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5><i class="bi bi-clipboard-data me-2"></i>Results</h5>
                    </div>
                    <div class="card-body">
                        <div class="output-container mt-4" style="display: none;" id="outputSection">
                            <h5 class="mb-3">Copyable Results</h5>
                            <button id="copyButton" class="btn btn-outline-primary">
                                <i class="bi bi-clipboard me-2"></i>Copy
                            </button>
                            <!-- <textarea id="outputText" class="form-control" rows="10" readonly></textarea> -->
                        </div>
                        <div id="results">
                            <div class="alert alert-info">
                                <i class="bi bi-info-circle me-2"></i>Enter domains in both lists above and click "Check Duplicates" to start.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Copyright Section -->
        <div class="copyright">
            <p>© 2024 BahariHost - All Rights Reserved</p>
            <p>Domain Duplicate Checker v1.0.0</p>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
        // Store API credentials
        let mozAccessId = localStorage.getItem('mozAccessId') || '';
        let mozSecretKey = localStorage.getItem('mozSecretKey') || '';
        let autoCheckDA = localStorage.getItem('autoCheckDA') !== 'false';

        // Initialize API credentials if stored
        $('#mozAccessId').val(mozAccessId);
        $('#mozSecretKey').val(mozSecretKey);
        $('#autoCheckDA').prop('checked', autoCheckDA);

        // Save API credentials when changed
        $('#mozAccessId, #mozSecretKey').on('change', function() {
            mozAccessId = $('#mozAccessId').val();
            mozSecretKey = $('#mozSecretKey').val();
            localStorage.setItem('mozAccessId', mozAccessId);
            localStorage.setItem('mozSecretKey', mozSecretKey);
        });

        // Save auto-check preference
        $('#autoCheckDA').on('change', function() {
            autoCheckDA = $(this).prop('checked');
            localStorage.setItem('autoCheckDA', autoCheckDA);
        });

        // Update domain count when textarea changes
        $('.textarea-container textarea').on('input', function() {
            const id = $(this).attr('id');
            const domains = $(this).val().trim().split('\n').filter(line => line.trim() !== '');
            $(`#charCount${id.slice(-1)}`).text(domains.length + ' domains');
        });

        // Clear all functionality
        $('#clearAll').click(function() {
            $('#domainList1, #domainList2').val('');
            $('#results').html('<div class="alert alert-info"><i class="bi bi-info-circle me-2"></i>Enter domains in both lists above and click "Check Duplicates" to start.</div>');
            $('.charCount').text('0 domains');
            $('#outputSection').hide();
        });

        // Copy button functionality
        $('#copyButton').click(function() {
            const outputText = $('#outputText');
            outputText.select();
            document.execCommand('copy');

            // Visual feedback
            const originalText = $(this).text();
            $(this).text('Copied!');
            setTimeout(() => {
                $(this).text(originalText);
            }, 1500);
        });

        // Process domains from a text input
        function processDomains(input) {
            const lines = input.trim().split('\n').filter(line => line.trim() !== '');
            const domains = new Map();

            lines.forEach((line, index) => {
                let [domain, da] = line.trim().split(/\s+/);

                // First remove http/https from the full URL
                const urlWithoutProtocol = domain.replace(/^https?:\/\/+/, '');

                // Get only the domain part (everything before the first slash)
                const domainPart = urlWithoutProtocol.split('/')[0];

                // Clean domain and remove trailing slashes
                const cleanDomain = domainPart.toLowerCase()
                            .replace(/^www\./i, '')       // Remove www.
                            .replace(/\/+$/, '');         // Remove trailing slashes

                // Store with the base domain as key
                domains.set(cleanDomain, {
                    lineNum: index + 1,
                    originalDomain: cleanDomain,  // Keep only the domain without any path
                    baseDomain: cleanDomain,     // Clean domain for duplicate checking
                    da: da || ''                // Empty string if no DA provided
                });
            });

            return domains;
        }

        // Format domain output
        function formatDomainOutput(domain, data) {
            // Show only the domain without any path
            return data.da ? `${data.baseDomain}\t${data.da}` : data.baseDomain;
        }

        // Format domain output for display (not for copying)
        function formatDomainDisplayOutput(domain, data) {
            // Show only the domain without any path
            return data.da ? `${data.baseDomain} ${data.da}` : data.baseDomain;
        }

        // Main duplicate checking functionality
        $('#checkDuplicates').click(function() {
            const input1 = $('#domainList1').val().trim();
            const input2 = $('#domainList2').val().trim();

            if (!input1 || !input2) {
                $('#results').html('<div class="alert alert-warning"><i class="bi bi-exclamation-triangle me-2"></i>Please enter domains in both lists.</div>');
                $('#outputSection').hide();
                return;
            }

            // Process both domain lists
            const domains1 = processDomains(input1);
            const domains2 = processDomains(input2);
            const duplicates = new Map();
            const uniqueInList2 = new Map();

            // Find duplicates and unique domains (only from list 2)
            domains2.forEach((data2, domain) => {
                // Check only base domain for duplicates
                if (domains1.has(domain)) {
                    duplicates.set(domain, {
                        list1: domains1.get(domain),
                        list2: data2
                    });
                } else {
                    uniqueInList2.set(domain, data2);
                }
            });

            // Generate results HTML and plain text
            let resultsHtml = '';
            let plainTextOutput = '';

            // Prepare duplicate domains text
            let duplicateText = '';
            if (duplicates.size === 0) {
                duplicateText += 'No duplicates found\n';
            } else {
                duplicates.forEach((data, domain) => {
                    duplicateText += formatDomainOutput(domain, data.list2) + '\n';
                });
            }

            // Prepare non-duplicate domains text (only from list 2)
            let nonDuplicateText = '';
            uniqueInList2.forEach((data, domain) => {
                nonDuplicateText += formatDomainOutput(domain, data) + '\n';
            });

            // Generate simplified HTML display with side-by-side layout
            resultsHtml = '<div class="alert alert-info mb-3">';
            resultsHtml += '<i class="bi bi-info-circle me-2"></i>Results show only domains from the second list.';
            resultsHtml += '</div>';

            // Create row for side-by-side display
            resultsHtml += '<div class="row">';

            // Duplicates section (left side)
            resultsHtml += '<div class="col-md-6 mb-4">';
            resultsHtml += '<div class="position-relative">';
            resultsHtml += '<h5 class="mb-3">Duplicates (Found in Both Lists)</h5>';
            resultsHtml += '<button class="btn btn-sm btn-outline-primary position-absolute top-0 end-0 copy-section" data-section="duplicates">';
            resultsHtml += '<i class="bi bi-clipboard me-1"></i>Copy</button>';
            resultsHtml += '<div class="p-3 bg-light rounded" style="min-height: 200px">';
            if (duplicates.size === 0) {
                resultsHtml += '<p class="text-muted">No duplicates found</p>';
            } else {
                duplicates.forEach((data, domain) => {
                    resultsHtml += `<div>${formatDomainDisplayOutput(domain, data.list2)}</div>`;
                });
            }
            resultsHtml += '</div>';
            resultsHtml += '<textarea class="d-none" id="duplicatesText">' + duplicateText + '</textarea>';
            resultsHtml += '</div>';
            resultsHtml += '</div>';

            // Non-duplicates section (right side)
            resultsHtml += '<div class="col-md-6 mb-4">';
            resultsHtml += '<div class="position-relative">';
            resultsHtml += '<h5 class="mb-3">Unique Domains (New Links)</h5>';
            resultsHtml += '<button class="btn btn-sm btn-outline-primary position-absolute top-0 end-0 copy-section" data-section="nonDuplicates">';
            resultsHtml += '<i class="bi bi-clipboard me-1"></i>Copy</button>';
            resultsHtml += '<div class="p-3 bg-light rounded" style="min-height: 200px">';
            uniqueInList2.forEach((data, domain) => {
                resultsHtml += `<div>${formatDomainDisplayOutput(domain, data)}</div>`;
            });
            resultsHtml += '</div>';
            resultsHtml += '<textarea class="d-none" id="nonDuplicatesText">' + nonDuplicateText + '</textarea>';
            resultsHtml += '</div>';
            resultsHtml += '</div>';

            resultsHtml += '</div>'; // Close row

            // Update both displays
            $('#results').html(resultsHtml);
            $('#outputText').val(plainTextOutput);
            $('#outputSection').show();

            // Add click handlers for copy buttons
            $('.copy-section').click(function() {
                const section = $(this).data('section');
                const textArea = $(`#${section}Text`);
                textArea.removeClass('d-none');
                textArea.select();
                document.execCommand('copy');
                textArea.addClass('d-none');

                // Visual feedback
                const originalText = $(this).html();
                $(this).html('<i class="bi bi-check me-1"></i>Copied!');
                setTimeout(() => {
                    $(this).html(originalText);
                }, 1500);
            });
        });
    });
    </script>
</body>
</html>
