<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bad Site Checker</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-color: #4f46e5;
            --secondary-color: #818cf8;
            --success-color: #10b981;
            --warning-color: #f59e0b;
            --danger-color: #ef4444;
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
        }

        .card-body {
            padding: 1.5rem;
        }

        .result-item {
            padding: 1rem 1.5rem;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            margin-bottom: 0.5rem;
            background: var(--card-background);
            transition: all 0.3s ease;
        }

        .result-item:hover {
            transform: translateY(-1px);
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }

        .result-item.success {
            border-left: 4px solid var(--success-color);
        }

        .result-item.warning {
            border-left: 4px solid var(--danger-color);
        }

        .protocol {
            font-family: 'SF Mono', SFMono-Regular, ui-monospace, Menlo, Monaco, 'Cascadia Mono', 'Segoe UI Mono',
                'Roboto Mono', 'Oxygen Mono', 'Ubuntu Monospace', 'Source Code Pro', 'Fira Mono', 'Droid Sans Mono',
                'Courier New', monospace;
            font-weight: 500;
        }

        .progress {
            background-color: rgba(79, 70, 229, 0.1);
            height: 8px;
            border-radius: 4px;
            overflow: hidden;
        }

        .progress-bar {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
        }

        .stats-card {
            background: var(--card-background);
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            box-shadow: 0 1px 3px rgba(0,0,0,0.12);
            transition: all 0.3s cubic-bezier(.25,.8,.25,1);
        }

        .stats-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .stats-title {
            font-size: 0.875rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #4b5563;
        }

        .stats-value {
            font-size: 2rem;
            font-weight: 700;
            line-height: 1.2;
            color: var(--primary-color);
        }

        .stats-value.text-success { color: var(--success-color) !important; }
        .stats-value.text-danger { color: var(--danger-color) !important; }
        .stats-value.text-primary { color: var(--primary-color) !important; }

        .stats-label {
            font-size: 0.75rem;
            color: #6b7280;
            margin-top: 0.25rem;
        }

        .list-section {
            margin-top: 2rem;
        }

        .list-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid #e5e7eb;
            color: #1f2937;
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

        .btn-outline-primary {
            color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-outline-primary:hover {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            transform: translateY(-1px);
        }

        .form-control {
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 1rem;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
        }

        .alert {
            border-radius: 8px;
            border: none;
            padding: 1rem 1.5rem;
        }

        .alert-info {
            background-color: rgba(79, 70, 229, 0.1);
            color: var(--primary-color);
        }

        .alert-warning {
            background-color: rgba(245, 158, 11, 0.1);
            color: var(--warning-color);
        }

        .alert-danger {
            background-color: rgba(239, 68, 68, 0.1);
            color: var(--danger-color);
        }

        /* Navigation Styles */
        .navbar {
            padding: 1rem 0;
            background: white;
            box-shadow: 0 1px 3px rgba(0,0,0,0.12);
            margin-bottom: 2rem;
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
            background-color: var(--primary-color);
            color: white !important;
        }

        .nav-link i {
            font-size: 1.1rem;
        }

        @media (max-width: 768px) {
            .container {
                padding: 0 1rem;
            }

            .stats-card {
                margin-bottom: 1rem;
            }

            .page-title {
                font-size: 2rem;
            }

            .btn {
                padding: 0.5rem 1rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->

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
                        <a class="nav-link active" href="{{ route('badsite-checker') }}">
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

    <!-- Main Content -->
    <div class="container py-5">
        <h1 class="page-title text-center">Bad Site Checker</h1>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-3">
                            <i class="bi bi-shield-check me-2"></i>Check Website Status
                        </h5>
                        <div class="mb-3">
                            <label for="domainList" class="form-label">Enter domains (one per line)</label>
                            <textarea class="form-control" id="domainList" rows="6" placeholder="example.com&#10;example.net&#10;example.org"></textarea>
                            <div class="form-text" id="charCount">0 domains</div>
                        </div>
                        <div class="d-flex gap-2">
                            <button class="btn btn-primary" id="checkUrls">
                                <i class="bi bi-search me-2"></i>Check Sites
                            </button>
                            <button class="btn btn-outline-secondary" id="clearAll">
                                <i class="bi bi-trash me-2"></i>Clear All
                            </button>
                            <button class="btn btn-outline-primary" id="copyAll" style="display: none;">
                                <i class="bi bi-clipboard me-2"></i>Copy All URLs
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Statistics Cards -->
                <div class="row mb-4" id="statsCards" style="display: none;">
                    <div class="col-md-3 col-sm-6">
                        <div class="stats-card">
                            <div class="stats-title">Total Sites</div>
                            <div class="stats-value" id="totalSites">0</div>
                            <div class="stats-label">Domains checked</div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="stats-card">
                            <div class="stats-title text-success">Working Sites</div>
                            <div class="stats-value text-success" id="workingSites">0</div>
                            <div class="stats-label">Accessible domains</div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="stats-card">
                            <div class="stats-title text-danger">Bad Sites</div>
                            <div class="stats-value text-danger" id="badSites">0</div>
                            <div class="stats-label">Inaccessible domains</div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="stats-card">
                            <div class="stats-title text-primary">HTTPS Sites</div>
                            <div class="stats-value text-primary" id="httpsSites">0</div>
                            <div class="stats-label">Secure connections</div>
                        </div>
                    </div>
                </div>

                <!-- Results Section -->
                <div id="results">
                    <div class="alert alert-info">
                        <i class="bi bi-info-circle me-2"></i>Enter domains above and click "Check Sites" to start.
                    </div>
                </div>

                <!-- Working Sites List -->
                <div class="list-section" id="workingSitesList" style="display: none;">
                    <div class="list-title text-success d-flex justify-content-between align-items-center">
                        <div>
                            <i class="bi bi-check-circle me-2"></i>Working Sites
                        </div>
                        <button class="btn btn-outline-success btn-sm" id="copyWorkingUrls">
                            <i class="bi bi-clipboard me-2"></i>Copy Working URLs
                        </button>
                    </div>
                    <div id="workingSitesContent"></div>
                </div>

                <!-- Bad Sites List -->
                <div class="list-section" id="badSitesList" style="display: none;">
                    <div class="list-title text-danger">
                        <i class="bi bi-exclamation-triangle me-2"></i>Bad Sites
                    </div>
                    <div id="badSitesContent"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- How to Use Modal -->
    <div class="modal fade" id="howToModal" tabindex="-1" aria-labelledby="howToModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="howToModalLabel">
                        <i class="bi bi-book me-2"></i>How to Use Bad Site Checker
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-4">
                        <h6 class="fw-bold mb-3">1. Enter Your Domains</h6>
                        <p>Enter your list of domains in the text area, one domain per line. For example:</p>
                        <pre class="bg-light p-3 rounded">example.com
website.net
mydomain.org</pre>
                    </div>
                    <div class="mb-4">
                        <h6 class="fw-bold mb-3">2. Check Sites</h6>
                        <p>Click the "Check Sites" button to start the verification process. The tool will:</p>
                        <ul>
                            <li>Check if each domain is accessible</li>
                            <li>Verify HTTPS support</li>
                            <li>Test WWW subdomain requirements</li>
                            <li>Identify bad or inaccessible sites</li>
                        </ul>
                    </div>
                    <div class="mb-4">
                        <h6 class="fw-bold mb-3">3. Review Results</h6>
                        <p>Results will be displayed in two sections:</p>
                        <ul>
                            <li><span class="text-success">Working Sites</span> - Accessible domains with their protocols</li>
                            <li><span class="text-danger">Bad Sites</span> - Inaccessible or problematic domains</li>
                        </ul>
                    </div>
                    <div>
                        <h6 class="fw-bold mb-3">4. Additional Features</h6>
                        <ul>
                            <li>Use the copy button next to each result to copy individual URLs</li>
                            <li>Click "Copy All URLs" to copy the complete list</li>
                            <li>View statistics about HTTPS usage and accessibility</li>
                        </ul>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Got it!</button>
                </div>
            </div>
        </div>
    </div>

    <!-- About Modal -->
    <div class="modal fade" id="aboutModal" tabindex="-1" aria-labelledby="aboutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="aboutModalLabel">
                        <i class="bi bi-info-square me-2"></i>About Bad Site Checker
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center mb-4">
                        <img src="https://client.baharihost.com/templates/lagom2/assets/img/logo/logo_big.244953714.png" alt="BahariHost Logo" height="40" class="mb-3">
                        <h5 class="mb-3">Bad Site Checker v1.0.0</h5>
                        <p class="text-muted">A tool by BahariHost</p>
                    </div>
                    <p>Bad Site Checker is a powerful tool designed to help you identify and verify the status of multiple domains quickly and efficiently. It checks for:</p>
                    <ul class="mb-3">
                        <li>Website accessibility</li>
                        <li>HTTPS support</li>
                        <li>WWW subdomain requirements</li>
                        <li>Domain status and errors</li>
                    </ul>
                    <p class="mb-0">Part of the BahariHost Domain Tools suite, helping you manage and verify your domains with ease.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function() {
    // Check if a domain is accessible and get its status
    async function checkDomainStatus(domain) {
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
                        originalDomain: domain,
                        cleanDomain: domain,
                        error: null
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
                        originalDomain: domain,
                        cleanDomain: domain,
                        error: null
                    };
                }
            }

            // If all checks fail, return as bad site
            return {
                url: `http://${domain}`,
                success: false,
                protocol: 'http://',
                usesWww: false,
                status: 'inactive',
                originalDomain: domain,
                cleanDomain: domain,
                error: 'Site is not accessible'
            };
        } catch (error) {
            return {
                url: `http://${domain}`,
                success: false,
                protocol: 'http://',
                usesWww: false,
                status: 'error',
                originalDomain: domain,
                cleanDomain: domain,
                error: error.message || 'Unknown error occurred'
            };
        }
    }

    // Process domains in parallel with rate limiting
    async function processDomains(input) {
        const lines = input.trim().split('\n').filter(line => line.trim() !== '');
        const results = {
            working: [],
            bad: [],
            stats: {
                total: lines.length,
                working: 0,
                bad: 0,
                https: 0,
                duplicates: 0
            }
        };
        let processedCount = 0;
        const duplicateMap = new Map(); // Track duplicates

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

                const result = await checkDomainStatus(cleanDomain);
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

                // Check for duplicates
                const key = result.cleanDomain;
                if (!duplicateMap.has(key)) {
                    duplicateMap.set(key, {
                        count: 1,
                        result: result,
                        originalDomains: [line.trim()]
                    });
                } else {
                    duplicateMap.get(key).count++;
                    duplicateMap.get(key).originalDomains.push(line.trim());
                    results.stats.duplicates++;
                }

                return result;
            });

            await Promise.all(batchPromises);

            // Small delay between batches to prevent rate limiting
            if (i + batchSize < lines.length) {
                await new Promise(r => setTimeout(r, 500));
            }
        }

        // Process results and handle duplicates
        duplicateMap.forEach((value, key) => {
            const result = value.result;
            if (result.success) {
                results.working.push({
                    ...result,
                    isDuplicate: value.count > 1,
                    duplicateCount: value.count,
                    originalDomains: value.originalDomains
                });
                results.stats.working++;
                if (result.protocol === 'https://') {
                    results.stats.https++;
                }
            } else {
                results.bad.push({
                    ...result,
                    isDuplicate: value.count > 1,
                    duplicateCount: value.count,
                    originalDomains: value.originalDomains
                });
                results.stats.bad++;
            }
        });

        return results;
    }

    // Update progress bar
    function updateProgress(percent) {
        $('#results').html(`
            <div class="alert alert-info">
                <div class="d-flex align-items-center">
                    <div class="me-3">
                        <i class="bi bi-arrow-repeat me-2"></i>
                        Checking sites... ${percent}%
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

    // Format a single result item
    function formatResultItem(result) {
        const statusClass = result.success ? 'success' : 'warning';
        const statusIcon = result.success ? 'check-circle' : 'exclamation-triangle';
        const statusColor = result.success ? '#10b981' : '#f59e0b';
        const protocolColor = result.protocol === 'https://' ? '#10b981' : '#f59e0b';

        let duplicateInfo = '';
        if (result.isDuplicate) {
            duplicateInfo = `
                <div class="mt-1">
                    <small class="text-muted">
                        <i class="bi bi-files me-1"></i>Found in ${result.duplicateCount} line${result.duplicateCount > 1 ? 's' : ''}
                    </small>
                </div>
            `;
        }

        return `
            <div class="result-item ${statusClass}">
                <div class="d-flex align-items-center">
                    <i class="bi bi-${statusIcon} me-2" style="color: ${statusColor}"></i>
                    <div class="flex-grow-1">
                        <div class="mb-1">
                            <span class="protocol" style="color: ${protocolColor}">${result.protocol}</span>
                            ${result.usesWww ? '<span class="protocol">www.</span>' : ''}
                            <span>${result.cleanDomain}</span>
                            ${result.da !== undefined && result.da !== null ? `<span class="badge bg-info ms-2">DA: ${result.da}</span>` : ''}
                            ${result.isDuplicate ? '<span class="badge bg-warning ms-2">Duplicate</span>' : ''}
                        </div>
                        <small class="text-muted">
                            ${result.error ? `Error: ${result.error}` : `Original: ${result.originalDomain}`}
                        </small>
                        ${duplicateInfo}
                    </div>
                    <button class="btn btn-sm btn-outline-primary copy-url" data-url="${result.url}" data-da="${result.da || ''}">
                        <i class="bi bi-clipboard"></i>
                    </button>
                </div>
            </div>
        `;
    }

    // Update statistics display
    function updateStats(stats) {
        $('#totalSites').text(stats.total);
        $('#workingSites').text(stats.working);
        $('#badSites').text(stats.bad);
        $('#httpsSites').text(stats.https);
        if (stats.duplicates > 0) {
            $('#results').prepend(`
                <div class="alert alert-warning mb-3">
                    <i class="bi bi-files me-2"></i>Found ${stats.duplicates} duplicate domain${stats.duplicates > 1 ? 's' : ''}
                </div>
            `);
        }
        $('#statsCards').show();
    }

    // Format and display results
    function displayResults(results) {
        // Update statistics
        updateStats(results.stats);

        // Clear previous results
        $('#workingSitesContent').empty();
        $('#badSitesContent').empty();

        // Display working sites
        if (results.working.length > 0) {
            results.working.forEach(result => {
                $('#workingSitesContent').append(formatResultItem(result));
            });
            $('#workingSitesList').show();
        }

        // Display bad sites
        if (results.bad.length > 0) {
            results.bad.forEach(result => {
                $('#badSitesContent').append(formatResultItem(result));
            });
            $('#badSitesList').show();
        }

        // Show copy all button if there are results
        if (results.working.length > 0 || results.bad.length > 0) {
            $('#copyAll').show();
        }

        // Update results message
        $('#results').html(`
            <div class="alert ${results.stats.working > 0 ? 'alert-success' : 'alert-warning'}">
                <i class="bi bi-info-circle me-2"></i>
                Found ${results.stats.working} working sites and ${results.stats.bad} bad sites.
            </div>
        `);
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
        $('#results').html('<div class="alert alert-info"><i class="bi bi-info-circle me-2"></i>Enter domains above and click "Check Sites" to start.</div>');
        $('#workingSitesList, #badSitesList, #statsCards, #copyAll').hide();
    });

    // Check URLs button click handler
    $('#checkUrls').click(async function() {
        const input = $('#domainList').val().trim();

        if (!input) {
            $('#results').html('<div class="alert alert-warning"><i class="bi bi-exclamation-triangle me-2"></i>Please enter at least one domain.</div>');
            $('#workingSitesList, #badSitesList, #statsCards, #copyAll').hide();
            return;
        }

        // Disable button and show initial progress
        $(this).prop('disabled', true).html('<span class="spinner-border spinner-border-sm me-2"></span>Checking...');
        updateProgress(0);

        try {
            const results = await processDomains(input);
            displayResults(results);
        } catch (error) {
            $('#results').html('<div class="alert alert-danger"><i class="bi bi-exclamation-triangle me-2"></i>An error occurred while checking the sites.</div>');
            $('#workingSitesList, #badSitesList, #statsCards, #copyAll').hide();
        } finally {
            // Reset button state
            $(this).prop('disabled', false).html('<i class="bi bi-search me-2"></i>Check Sites');
        }
    });

    // Copy URL functionality - using event delegation for dynamic elements
    $(document).on('click', '.copy-url', function() {
        const url = $(this).data('url');
        const da = $(this).data('da');
        const textToCopy = da ? `${url}\t${da}` : url;
        copyToClipboard(textToCopy);
        showCopySuccess($(this));
    });

    // Copy working URLs
    $('#copyWorkingUrls').click(function() {
        // Add data rows without headers
        let workingUrls = $('.result-item.success .copy-url').map(function() {
            const url = $(this).data('url');
            const da = $(this).data('da');
            return da ? `${url}\t${da}` : url;
        }).get().join('\n');

        navigator.clipboard.writeText(workingUrls);

        const originalHtml = $(this).html();
        $(this).html('<i class="bi bi-check me-2"></i>Copied!');

        setTimeout(() => {
            $(this).html(originalHtml);
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

    // Helper function to copy text to clipboard
    function copyToClipboard(text) {
        const textarea = document.createElement('textarea');
        textarea.value = text;
        document.body.appendChild(textarea);
        textarea.select();
        document.execCommand('copy');
        document.body.removeChild(textarea);
    }

    // Show copy success feedback
    function showCopySuccess(button) {
        const originalHtml = button.html();
        button.html('<i class="bi bi-check2"></i>');
        setTimeout(() => {
            button.html(originalHtml);
        }, 2000);
    }
});
</script>
</body>
</html>
