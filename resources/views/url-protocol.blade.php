<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URL Protocol Checker - BahariHost</title>
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

        /* Navigation Styles */
        .navbar {
            padding: 1rem 0;
            background-color: var(--card-background);
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }

        .nav-item {
            margin: 0 0.3rem;
        }

        .nav-link {
            padding: 0.5rem 1rem !important;
            border-radius: 8px;
            transition: all 0.3s ease;
            font-weight: 500;
            color: #4b5563 !important;
        }

        .nav-link:hover {
            background-color: rgba(79, 70, 229, 0.1);
            color: var(--primary-color) !important;
        }

        .nav-link.active {
            background-color: var(--primary-color) !important;
            color: white !important;
        }

        .nav-link i {
            font-size: 1.1rem;
            margin-right: 0.5rem;
        }

        /* Card Styles */
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
            background: var(--card-background);
            transition: all 0.3s cubic-bezier(.25,.8,.25,1);
            margin-bottom: 1.5rem;
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
            display: flex;
            align-items: center;
        }

        .card-header h5 i {
            margin-right: 0.75rem;
            font-size: 1.1rem;
        }

        .card-body {
            padding: 1.5rem;
        }

        /* Form Elements */
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
            width: 100%;
            background-color: #fff;
        }

        textarea:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1) !important;
            outline: none;
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

        /* Buttons */
        .btn {
            padding: 0.6rem 1.5rem;
            font-weight: 500;
            border-radius: 8px;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .btn i {
            margin-right: 0.5rem;
            font-size: 1.1rem;
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

        .btn-outline-primary {
            color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-outline-primary:hover {
            background-color: var(--primary-color);
            color: white;
        }

        /* Results Section */
        .result-item {
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 0.75rem;
            background-color: #f8fafc;
            border: 1px solid #e5e7eb;
            transition: all 0.2s ease;
        }

        .result-item:hover {
            border-color: var(--primary-color);
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }

        .result-item.success {
            border-left: 4px solid var(--success-color);
        }

        .result-item .protocol {
            font-weight: 600;
            color: var(--success-color);
        }

        /* Alerts */
        .alert {
            border-radius: 8px;
            border: none;
            padding: 1rem 1.25rem;
            display: flex;
            align-items: center;
        }

        .alert i {
            margin-right: 0.75rem;
            font-size: 1.1rem;
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

        /* Modal Styles */
        .modal-content {
            border: none;
            border-radius: 12px;
        }

        .modal-header {
            border-bottom: 1px solid #e5e7eb;
            padding: 1.25rem 1.5rem;
        }

        .modal-body {
            padding: 1.5rem;
        }

        .list-group {
            border-radius: 8px;
            overflow: hidden;
        }

        .list-group-item {
            border: 1px solid #e5e7eb;
            padding: 1rem 1.25rem;
        }

        /* Copyright Section */
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
                        <a class="nav-link" href="{{ route('home') }}">
                            <i class="bi bi-intersect me-1"></i>Duplicate URL Checker
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('badsite-checker') }}">
                            <i class="bi bi-shield-check me-1"></i>Bad Site Checker
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('url-protocol') }}">
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
        <h1 class="page-title text-center">URL Protocol Checker</h1>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5><i class="bi bi-globe"></i>Enter Domains</h5>
                    </div>
                    <div class="card-body">
                        <div class="textarea-container">
                            <textarea id="domainList" class="form-control" rows="10"
                                placeholder="Enter domains (one per line)&#10;Example:&#10;example.com&#10;test.com"></textarea>
                            <span class="charCount" id="charCount">0 domains</span>
                        </div>
                        <div class="text-center mt-4">
                            <button id="checkUrls" class="btn btn-primary">
                                <i class="bi bi-search"></i>Check URLs
                            </button>
                            <button id="clearAll" class="btn btn-secondary">
                                <i class="bi bi-trash"></i>Clear All
                            </button>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5><i class="bi bi-check-circle"></i>Results</h5>
                            <button id="copyAll" class="btn btn-outline-primary btn-sm" style="display: none;">
                                <i class="bi bi-clipboard"></i>Copy All URLs
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="results">
                            <div class="alert alert-info">
                                <i class="bi bi-info-circle"></i>Enter domains above and click "Check URLs" to start.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- How to Use Modal -->
        <div class="modal fade" id="howToModal" tabindex="-1" aria-labelledby="howToModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="howToModalLabel">How to Use URL Protocol Checker</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <ol class="list-group list-group-numbered">
                            <li class="list-group-item">Enter your list of domains (one per line)</li>
                            <li class="list-group-item">Click "Check URLs" to analyze each domain</li>
                            <li class="list-group-item">The tool will check if each domain:
                                <ul class="mt-2">
                                    <li>Supports HTTPS</li>
                                    <li>Uses www subdomain</li>
                                    <li>Requires specific protocol</li>
                                </ul>
                            </li>
                            <li class="list-group-item">Results will show the correct URL format for each domain</li>
                            <li class="list-group-item">Use the "Copy All URLs" button to copy results</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- About Modal -->
        <div class="modal fade" id="aboutModal" tabindex="-1" aria-labelledby="aboutModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="aboutModalLabel">About URL Protocol Checker</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="text-center mb-4">
                            <img src="https://client.baharihost.com/templates/lagom2/assets/img/logo/logo_big.244953714.png" alt="BahariHost Logo" height="60">
                        </div>
                        <p class="mb-3">URL Protocol Checker is a tool designed to help you verify and format URLs correctly. It automatically detects the proper protocol (HTTP/HTTPS) and subdomain configuration for each domain.</p>
                        <p class="mb-3">Features:</p>
                        <ul>
                            <li>Automatic HTTPS detection</li>
                            <li>WWW subdomain verification</li>
                            <li>Bulk URL processing</li>
                            <li>Easy copy-paste functionality</li>
                        </ul>
                        <hr>
                        <p class="text-muted mb-0">Version 1.0.0<br>Developed by Atikullah</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Copyright Section -->
        <div class="copyright">
            <p>© 2024 BahariHost - All Rights Reserved</p>
            <p>URL Protocol Checker v1.0.0</p>
            <p>Developed by Atikullah</p>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
$(document).ready(function() {
    // Check if a domain supports HTTPS and WWW
    async function checkDomainProtocol(domain) {
        try {
            // Clean the domain first
            domain = domain.replace(/^(https?:\/\/)?(www\.)?/, '').trim();

            // Function to check if URL responds
            function checkUrl(url) {
                return new Promise((resolve) => {
                    const timeoutDuration = 5000;
                    let resolved = false;

                    // Try both HEAD request and image loading
                    fetch(url, {
                        method: 'HEAD',
                        mode: 'no-cors',
                        cache: 'no-cache'
                    }).then(() => {
                        if (!resolved) {
                            resolved = true;
                            resolve(true);
                        }
                    }).catch(() => {});

                    // Also try image loading as backup
                    const img = new Image();
                    const timeout = setTimeout(() => {
                        if (!resolved) {
                            resolved = true;
                            resolve(false);
                        }
                    }, timeoutDuration);

                    img.onload = function() {
                        clearTimeout(timeout);
                        if (!resolved) {
                            resolved = true;
                            resolve(true);
                        }
                    };

                    img.onerror = function() {
                        clearTimeout(timeout);
                        if (!resolved) {
                            resolved = true;
                            resolve(false);
                        }
                    };

                    img.src = url + "/favicon.ico?" + Date.now();
                });
            }

            // First priority: Try HTTPS with both www and non-www
            const httpsVersions = [
                { url: `https://www.${domain}`, www: true },
                { url: `https://${domain}`, www: false }
            ];

            // Check HTTPS versions first
            for (const version of httpsVersions) {
                const isAccessible = await checkUrl(version.url);
                if (isAccessible) {
                    return {
                        url: version.url,
                        success: true,
                        protocol: 'https://',
                        usesWww: version.www,
                        status: 'active',
                        wwwRequired: version.www && !(await checkUrl(`https://${domain}`))
                    };
                }
            }

            // Second priority: If HTTPS fails, try HTTP with both www and non-www
            const httpVersions = [
                { url: `http://www.${domain}`, www: true },
                { url: `http://${domain}`, www: false }
            ];

            // Try HTTP versions
            for (const version of httpVersions) {
                const isAccessible = await checkUrl(version.url);
                if (isAccessible) {
                    return {
                        url: version.url,
                        success: true,
                        protocol: 'http://',
                        usesWww: version.www,
                        status: 'active',
                        wwwRequired: version.www && !(await checkUrl(`http://${domain}`))
                    };
                }
            }

            // If all checks fail, return HTTP as default with success: false
            return {
                url: `http://${domain}`,
                success: false,
                protocol: 'http://',
                usesWww: false,
                status: 'inactive',
                wwwRequired: false
            };
        } catch (error) {
            console.error('Error checking domain:', domain, error);
            return {
                url: `http://${domain}`,
                success: false,
                protocol: 'http://',
                usesWww: false,
                status: 'error',
                wwwRequired: false
            };
        }
    }

    // Process domains in parallel with rate limiting
    async function processDomains(input) {
        const lines = input.trim().split('\n').filter(line => line.trim() !== '');
        const results = [];
        let processedCount = 0;

        // Process in batches of 5 for better performance
        const batchSize = 5;
        for (let i = 0; i < lines.length; i += batchSize) {
            const batch = lines.slice(i, i + batchSize);
            const batchPromises = batch.map(async (line) => {
                // Split line into domain and DA if present
                const [domain, da] = line.trim().split(/\s+/);

                // Extract the path if it exists
                const [domainPart, ...pathParts] = domain.split('/');
                const path = pathParts.length > 0 ? '/' + pathParts.join('/') : '';

                const cleanDomain = domainPart.toLowerCase()
                    .replace(/^https?:\/\//i, '')
                    .replace(/^www\./i, '')
                    .replace(/\/+$/, '')
                    .replace(/\.+$/, '')
                    .replace(/^\.+/, '')
                    .replace(/[^\w\s.-]/g, '');

                const result = await checkDomainProtocol(cleanDomain);
                processedCount++;

                // Update progress
                const progress = Math.round((processedCount / lines.length) * 100);
                updateProgress(progress);

                // Add DA to result if present
                if (da) {
                    result.da = da;
                }

                // Add the path back to the URL
                result.url = result.url + path;

                return {
                    originalDomain: line.trim(),
                    cleanDomain: cleanDomain,
                    ...result
                };
            });

            const batchResults = await Promise.all(batchPromises);
            results.push(...batchResults);

            // Small delay between batches to prevent rate limiting
            if (i + batchSize < lines.length) {
                await new Promise(r => setTimeout(r, 500));
            }
        }

        return results;
    }

    // Update progress bar with more details
    function updateProgress(percent) {
        $('#results').html(`
            <div class="alert alert-info">
                <div class="d-flex align-items-center">
                    <div class="me-3">
                        <i class="bi bi-arrow-repeat me-2"></i>
                        Checking URLs... ${percent}%
                    </div>
                    <div class="progress flex-grow-1" style="height: 8px;">
                        <div class="progress-bar progress-bar-striped progress-bar-animated"
                             role="progressbar"
                             style="width: ${percent}%"
                             aria-valuenow="${percent}"
                             aria-valuemin="0"
                             aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        `);
    }

    // Enhanced results formatting
    function formatResults(results) {
        let html = '';
        let allUrls = '';
        let stats = {
            total: results.length,
            https: 0,
            http: 0,
            active: 0,
            inactive: 0,
            wwwRequired: 0
        };

        results.forEach(result => {
            // Update stats
            if (result.protocol === 'https://') stats.https++;
            if (result.protocol === 'http://') stats.http++;
            if (result.success) stats.active++;
            if (!result.success) stats.inactive++;
            if (result.wwwRequired) stats.wwwRequired++;

            const statusClass = result.success ? 'success' : '';
            const statusIcon = result.success ? 'check-circle' : 'exclamation-triangle';
            const statusColor = result.success ? 'var(--success-color)' : 'var(--warning-color)';
            const protocolColor = result.protocol === 'https://' ? 'var(--success-color)' : 'var(--warning-color)';

            html += `
                <div class="result-item ${statusClass}">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-${statusIcon} me-2" style="color: ${statusColor}"></i>
                        <div class="flex-grow-1">
                            <div class="mb-1">
                                <span>${result.url}</span>
                                ${result.da ? `<span class="badge bg-info ms-2">DA: ${result.da}</span>` : ''}
                                ${result.wwwRequired ? '<span class="badge bg-info ms-2">www required</span>' : ''}
                            </div>
                            <small class="text-muted">Original: ${result.originalDomain}</small>
                        </div>
                        <button class="btn btn-sm btn-outline-primary copy-url" data-url="${result.url}" data-da="${result.da || ''}">
                            <i class="bi bi-clipboard"></i>
                        </button>
                    </div>
                </div>
            `;

            allUrls += result.da ? `${result.url}\t${result.da}\n` : `${result.url}\n`;
        });

        // Add statistics at the top
        const statsHtml = `
            <div class="alert alert-primary mb-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <strong>Total URLs:</strong> ${stats.total}
                        <span class="mx-2">|</span>
                        <span class="text-success">HTTPS: ${stats.https}</span>
                        <span class="mx-2">|</span>
                        <span class="text-warning">HTTP: ${stats.http}</span>
                        <span class="mx-2">|</span>
                        <span class="text-info">WWW Required: ${stats.wwwRequired}</span>
                    </div>
                    <div>
                        <span class="text-success">Active: ${stats.active}</span>
                        <span class="mx-2">|</span>
                        <span class="text-warning">Inactive: ${stats.inactive}</span>
                    </div>
                </div>
            </div>
        `;

        // Store all URLs for the copy all button
        $('#results').data('allUrls', allUrls.trim());

        return statsHtml + html;
    }

    // Update domain count when textarea changes
    $('#domainList').on('input', function() {
        const domains = $(this).val().trim().split('\n').filter(line => line.trim() !== '');
        $('#charCount').text(domains.length + ' domains');
    });

    // Clear all functionality
    $('#clearAll').click(function() {
        $('#domainList').val('');
        $('#charCount').text('0 domains');
        $('#results').html('<div class="alert alert-info"><i class="bi bi-info-circle me-2"></i>Enter domains above and click "Check URLs" to start.</div>');
        $('#copyAll').hide();
    });

    // Check URLs button click handler
    $('#checkUrls').click(async function() {
        const input = $('#domainList').val().trim();

        if (!input) {
            $('#results').html('<div class="alert alert-warning"><i class="bi bi-exclamation-triangle me-2"></i>Please enter at least one domain.</div>');
            $('#copyAll').hide();
            return;
        }

        // Disable button and show initial progress
        $(this).prop('disabled', true).html('<span class="spinner-border spinner-border-sm me-2"></span>Checking...');
        updateProgress(0);

        try {
            const results = await processDomains(input);
            const resultsHtml = formatResults(results);

            $('#results').html(resultsHtml);
            $('#copyAll').show();
        } catch (error) {
            $('#results').html('<div class="alert alert-danger"><i class="bi bi-exclamation-triangle me-2"></i>An error occurred while checking the URLs.</div>');
            $('#copyAll').hide();
        } finally {
            // Reset button state
            $(this).prop('disabled', false).html('<i class="bi bi-search me-2"></i>Check URLs');
        }
    });

    // Copy individual URL
    $(document).on('click', '.copy-url', function() {
        const url = $(this).data('url');
        const da = $(this).data('da');
        const textToCopy = da ? `${url}\t${da}` : url;
        navigator.clipboard.writeText(textToCopy);

        const originalHtml = $(this).html();
        $(this).html('<i class="bi bi-check"></i>').prop('disabled', true);

        setTimeout(() => {
            $(this).html(originalHtml).prop('disabled', false);
        }, 1500);
    });

    // Copy all URLs
    $('#copyAll').click(function() {
        // Add data rows without headers
        let allUrls = $('.result-item .copy-url').map(function() {
            const url = $(this).data('url');
            const da = $(this).data('da');
            return da ? `${url}\t${da}` : url;
        }).get().join('\n');

        navigator.clipboard.writeText(allUrls);

        const originalHtml = $(this).html();
        $(this).html('<i class="bi bi-check me-2"></i>Copied!');

        setTimeout(() => {
            $(this).html(originalHtml);
        }, 1500);
    });
});
</script>
</body>
</html>
