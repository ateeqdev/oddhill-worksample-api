<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookshelf API - Demo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background: linear-gradient(135deg, #1e3a8a 0%, #3730a3 100%);
            min-height: 100vh;
        }

        .glass {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: #1f2937;
        }

        .json-container {
            background: #1a1a1a;
            color: #f8f8f2;
            font-family: 'Monaco', 'Menlo', 'Ubuntu Mono', monospace;
            transition: all 0.3s ease;
        }

        .loading {
            animation: pulse 2s infinite;
        }

        .header-text {
            color: #ffffff;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        .url-display {
            background: rgba(255, 255, 255, 0.2);
            color: #ffffff;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .collapse-toggle {
            transition: transform 0.3s ease;
        }

        .collapse-toggle.rotated {
            transform: rotate(180deg);
        }

        .collapsible-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
        }

        .collapsible-content.expanded {
            max-height: 500px;
        }

        .section-spacing {
            margin-bottom: 1.5rem;
        }

        .result-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 0.75rem;
        }

        .empty-state {
            color: #6b7280;
            font-style: italic;
            text-align: center;
            padding: 2rem;
            border: 2px dashed #d1d5db;
            border-radius: 0.5rem;
            background: #f9fafb;
        }
    </style>
</head>

<body class="p-6">
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold header-text mb-2">Bookshelf API</h1>
            <p class="header-text text-lg opacity-90">Laravel-based REST API for managing books, authors, and genres</p>
            <div class="mt-4 glass rounded-lg p-4">
                <p class="text-gray-700 text-sm">
                    <strong>Base URL:</strong>
                    <span>/api/v1</span>
                </p>
            </div>
        </div>

        <div class="glass rounded-xl p-6 section-spacing">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Get Started</h2>
            <div class="space-y-4">
                <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
                    <h4 class="font-semibold mb-2 text-gray-800">Review the Code</h4>
                    <p class="text-sm mb-2 text-gray-600">Check out the complete implementation and see how it's built:</p>
                    <a href="https://github.com/ateeqdev/oddhill-worksample-api/pull/1/files"
                        target="_blank"
                        class="inline-block px-4 py-2 bg-gray-800 hover:bg-gray-700 text-white rounded text-sm transition-colors">
                        View on GitHub →
                    </a>
                </div>
                <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
                    <h4 class="font-semibold mb-2 text-gray-800">Test with Postman</h4>
                    <p class="text-sm mb-2 text-gray-600">Download the complete Postman collection to test all endpoints:</p>
                    <button
                        onclick="downloadPostmanCollection()"
                        class="inline-block px-4 py-2 bg-orange-600 hover:bg-orange-700 text-white rounded text-sm transition-colors">
                        Download Collection →
                    </button>
                </div>
            </div>
        </div>

        <div class="glass rounded-xl p-6 section-spacing">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Key Features</h2>
            <div class="grid md:grid-cols-2 gap-4">
                <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                    <h4 class="font-semibold mb-2 text-blue-800">Books Management</h4>
                    <p class="text-sm text-blue-700">Full CRUD operations with title, ISBN, and description</p>
                </div>
                <div class="bg-green-50 border border-green-200 rounded-lg p-4">
                    <h4 class="font-semibold mb-2 text-green-800">Authors & Genres</h4>
                    <p class="text-sm text-green-700">Manage authors and genres with many-to-many relationships</p>
                </div>
                <div class="bg-purple-50 border border-purple-200 rounded-lg p-4">
                    <h4 class="font-semibold mb-2 text-purple-800">Role-based Access</h4>
                    <p class="text-sm text-purple-700">Admin users can modify, regular users can only view</p>
                </div>
                <div class="bg-orange-50 border border-orange-200 rounded-lg p-4">
                    <h4 class="font-semibold mb-2 text-orange-800">Search & Filter</h4>
                    <p class="text-sm text-orange-700">Search books by title/ISBN, authors/genres by name</p>
                </div>
            </div>
        </div>

        <div class="glass rounded-xl p-6 mb-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Try the API</h2>

            <!-- Search Books by ISBN -->
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Search Books by ISBN</h3>
                <div class="flex gap-2 mb-3">
                    <input
                        type="text"
                        id="isbn_input"
                        placeholder="Enter ISBN (e.g., 9781408855669)"
                        value="9781408855669"
                        class="flex-1 px-4 py-2 rounded-lg bg-gray-50 text-gray-800 placeholder-gray-500 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <button
                        onclick="searchByISBN()"
                        class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium transition-colors">
                        Search
                    </button>
                </div>

                <div class="result-header">
                    <span class="text-sm font-medium text-gray-600">Response:</span>
                    <button
                        onclick="toggleCollapse('isbn_result')"
                        id="isbn_toggle"
                        class="px-3 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-lg transition-colors collapse-toggle hidden">
                        ▼
                    </button>
                </div>

                <div id="isbn_result" class="json-container rounded-lg p-4 min-h-[100px] overflow-x-auto collapsible-content">
                    <div class="empty-state">Click "Search" to see results</div>
                </div>
            </div>

            <!-- List All Books -->
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-2">List All Books</h3>
                <div class="flex gap-2 mb-3">
                    <button
                        onclick="listBooks()"
                        class="px-6 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg font-medium transition-colors">
                        Get Books (First 5)
                    </button>
                </div>

                <div class="result-header">
                    <span class="text-sm font-medium text-gray-600">Response:</span>
                    <button
                        onclick="toggleCollapse('books_result')"
                        id="books_toggle"
                        class="px-3 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-lg transition-colors collapse-toggle hidden">
                        ▼
                    </button>
                </div>

                <div id="books_result" class="json-container rounded-lg p-4 min-h-[100px] overflow-x-auto collapsible-content">
                    <div class="empty-state">Click "Get Books" to see results</div>
                </div>
            </div>

            <!-- Search Authors -->
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Search Authors</h3>
                <div class="flex gap-2 mb-3">
                    <input
                        type="text"
                        id="author_input"
                        placeholder="Enter author name (e.g., Rowling)"
                        value="Rowling"
                        class="flex-1 px-4 py-2 rounded-lg bg-gray-50 text-gray-800 placeholder-gray-500 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <button
                        onclick="searchAuthors()"
                        class="px-6 py-2 bg-purple-600 hover:bg-purple-700 text-white rounded-lg font-medium transition-colors">
                        Search
                    </button>
                </div>

                <div class="result-header">
                    <span class="text-sm font-medium text-gray-600">Response:</span>
                    <button
                        onclick="toggleCollapse('authors_result')"
                        id="authors_toggle"
                        class="px-3 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-lg transition-colors collapse-toggle hidden">
                        ▼
                    </button>
                </div>

                <div id="authors_result" class="json-container rounded-lg p-4 min-h-[100px] overflow-x-auto collapsible-content">
                    <div class="empty-state">Click "Search" to see results</div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const BASE_URL = '/api/v1';

        async function makeRequest(url, result_element_id) {
            const result_element = document.getElementById(result_element_id);
            const toggle_button = document.getElementById(result_element_id.replace('_result', '_toggle'));

            result_element.classList.add('expanded');
            result_element.innerHTML = '<div class="loading text-gray-400 text-center py-8">Loading...</div>';

            if (toggle_button) {
                toggle_button.classList.remove('hidden');
                toggle_button.classList.remove('rotated');
            }

            try {
                const response = await fetch(url);
                const data = await response.json();

                result_element.innerHTML = `<pre>${JSON.stringify(data, null, 2)}</pre>`;
            } catch (error) {
                result_element.innerHTML = `<div class="text-red-400 text-center py-8">Error: ${error.message}</div>`;
            }
        }

        function toggleCollapse(element_id) {
            const element = document.getElementById(element_id);
            const toggle = document.getElementById(element_id.replace('_result', '_toggle'));

            if (element.classList.contains('expanded')) {
                element.classList.remove('expanded');
                toggle.classList.add('rotated');
            } else {
                element.classList.add('expanded');
                toggle.classList.remove('rotated');
            }
        }

        function searchByISBN() {
            const isbn = document.getElementById('isbn_input').value.trim();
            if (!isbn) {
                alert('Please enter an ISBN');
                return;
            }
            const url = `${BASE_URL}/books?isbn=${isbn}&per_page=10`;
            makeRequest(url, 'isbn_result');
        }

        function listBooks() {
            const url = `${BASE_URL}/books?per_page=5`;
            makeRequest(url, 'books_result');
        }

        function searchAuthors() {
            const query = document.getElementById('author_input').value.trim();
            if (!query) {
                alert('Please enter an author name');
                return;
            }
            const url = `${BASE_URL}/authors?name=${query}&per_page=10`;
            makeRequest(url, 'authors_result');
        }

        function downloadPostmanCollection() {
            const link = document.createElement('a');
            link.href = '/Bookshelf_API.postman_collection.json';
            link.download = 'Bookshelf_API.postman_collection.json';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }

        document.getElementById('isbn_input').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') searchByISBN();
        });

        document.getElementById('author_input').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') searchAuthors();
        });
    </script>
</body>

</html>