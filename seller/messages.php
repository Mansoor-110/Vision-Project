<?php include('../includes/header.php'); ?>
<?php include('seller_sidebar.php'); ?>
<style>
    .main-content {
        padding: 20px;
        background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
        min-height: 100vh;
    }

    .welcome-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
        padding: 20px 0;
        border-bottom: 2px solid rgba(128, 0, 32, 0.1);
    }

    .welcome-text h1 {
        color: #2c2c2c;
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 8px;
        font-family: 'Georgia', serif;
    }

    .welcome-text p {
        color: #666;
        font-size: 16px;
        margin: 0;
    }

    .profile-avatar {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, #800020 0%, #a0002a 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 24px;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }

    .stat-card {
        background: linear-gradient(135deg, #ffffff 0%, #fafafa 100%);
        padding: 25px;
        border-radius: 15px;
        box-shadow: 0 6px 20px rgba(128, 0, 32, 0.1);
        border: 2px solid rgba(128, 0, 32, 0.05);
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(128, 0, 32, 0.15);
    }

    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, #800020, #a0002a);
    }

    .stat-card .stat-icon {
        font-size: 36px;
        color: #800020;
        margin-bottom: 15px;
    }

    .stat-card .stat-number {
        font-size: 32px;
        font-weight: 700;
        color: #2c2c2c;
        margin-bottom: 5px;
        font-family: 'Georgia', serif;
    }

    .stat-card .stat-label {
        font-size: 16px;
        color: #666;
        font-weight: 500;
    }

    .actions-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
        flex-wrap: wrap;
        gap: 15px;
    }

    .actions-header h2 {
        color: #2c2c2c;
        font-size: 24px;
        font-weight: 600;
        margin: 0;
        font-family: 'Georgia', serif;
    }

    .action-buttons {
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
    }

    .btn {
        padding: 12px 24px;
        border: none;
        border-radius: 10px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-family: 'Georgia', serif;
    }

    .btn-primary {
        background: linear-gradient(135deg, #800020 0%, #a0002a 100%);
        color: #ffffff;
        box-shadow: 0 4px 15px rgba(128, 0, 32, 0.3);
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(128, 0, 32, 0.4);
    }

    .btn-secondary {
        background: linear-gradient(135deg, #ffffff 0%, #f8f8f8 100%);
        color: #2c2c2c;
        border: 2px solid rgba(128, 0, 32, 0.2);
    }

    .btn-secondary:hover {
        background: rgba(128, 0, 32, 0.05);
        color: #800020;
        border-color: #800020;
    }

    .search-filter-bar {
        background: linear-gradient(135deg, #ffffff 0%, #fafafa 100%);
        padding: 25px;
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(128, 0, 32, 0.1);
        border: 2px solid rgba(128, 0, 32, 0.05);
        margin-bottom: 25px;
        position: relative;
        overflow: hidden;
    }

    .search-filter-bar::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, #800020, #a0002a);
    }

    .search-filter-grid {
        display: grid;
        grid-template-columns: 2fr 1fr 1fr auto;
        gap: 20px;
        align-items: end;
    }

    .search-group {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .search-label {
        font-size: 14px;
        font-weight: 600;
        color: #2c2c2c;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .search-label i {
        color: #800020;
        font-size: 16px;
    }

    .search-input,
    .search-select {
        padding: 12px 16px;
        border: 2px solid rgba(128, 0, 32, 0.2);
        border-radius: 10px;
        font-size: 14px;
        font-family: 'Georgia', serif;
        transition: all 0.3s ease;
        background: linear-gradient(135deg, #ffffff 0%, #fafafa 100%);
        color: #2c2c2c;
    }

    .search-input:focus,
    .search-select:focus {
        outline: none;
        border-color: #800020;
        box-shadow: 0 0 0 3px rgba(128, 0, 32, 0.1);
        background: #ffffff;
    }

    .products-container {
        background: linear-gradient(135deg, #ffffff 0%, #fafafa 100%);
        border-radius: 15px;
        box-shadow: 0 6px 25px rgba(128, 0, 32, 0.1);
        border: 2px solid rgba(128, 0, 32, 0.05);
        overflow: hidden;
        position: relative;
    }

    .products-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #800020, #a0002a);
    }

    .products-header {
        padding: 25px 30px;
        border-bottom: 2px solid rgba(128, 0, 32, 0.1);
        background: rgba(128, 0, 32, 0.02);
    }

    .products-header h3 {
        color: #2c2c2c;
        font-size: 20px;
        font-weight: 600;
        margin: 0;
        font-family: 'Georgia', serif;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .products-header i {
        color: #800020;
        font-size: 22px;
    }

    .products-table {
        width: 100%;
        border-collapse: collapse;
    }

    .products-table th {
        background: linear-gradient(135deg, rgba(128, 0, 32, 0.05) 0%, rgba(160, 0, 42, 0.05) 100%);
        padding: 18px 20px;
        text-align: left;
        font-weight: 600;
        color: #2c2c2c;
        font-size: 14px;
        border-bottom: 2px solid rgba(128, 0, 32, 0.1);
        font-family: 'Georgia', serif;
    }

    .products-table td {
        padding: 20px;
        border-bottom: 1px solid rgba(128, 0, 32, 0.05);
        vertical-align: middle;
    }

    .products-table tr:hover {
        background: rgba(128, 0, 32, 0.02);
        transition: all 0.3s ease;
    }

    .product-image {
        width: 60px;
        height: 60px;
        border-radius: 10px;
        object-fit: cover;
        border: 2px solid rgba(128, 0, 32, 0.1);
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .product-info {
        display: flex;
        flex-direction: column;
        gap: 4px;
    }

    .product-name {
        font-weight: 600;
        color: #2c2c2c;
        font-size: 16px;
        margin: 0;
    }

    .product-category {
        font-size: 13px;
        color: #666;
    }

    .product-price {
        font-weight: 700;
        color: #800020;
        font-size: 16px;
    }

    .status-badge {
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .status-active {
        background: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    .status-inactive {
        background: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }

    .status-draft {
        background: #fff3cd;
        color: #856404;
        border: 1px solid #ffeaa7;
    }

    .action-buttons-cell {
        display: flex;
        gap: 8px;
    }

    .btn-sm {
        padding: 8px 12px;
        font-size: 12px;
        min-width: auto;
    }

    .btn-edit {
        background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
        color: white;
    }

    .btn-edit:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(0, 123, 255, 0.3);
    }

    .btn-delete {
        background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
        color: white;
    }

    .btn-delete:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(220, 53, 69, 0.3);
    }

    .btn-view {
        background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        color: white;
    }

    .btn-view:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(40, 167, 69, 0.3);
    }
    .btn-plus{
        background: linear-gradient(135deg, #3158d9ff 0%, #645be1ff 100%);
        color: white;
    }

    .btn-plus:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(40, 167, 69, 0.3);
    }

    .empty-state {
        padding: 60px 30px;
        text-align: center;
        color: #666;
    }

    .empty-state i {
        font-size: 64px;
        color: rgba(128, 0, 32, 0.3);
        margin-bottom: 20px;
    }

    .empty-state h4 {
        font-size: 20px;
        margin-bottom: 10px;
        color: #2c2c2c;
    }

    .empty-state p {
        font-size: 16px;
        margin-bottom: 25px;
    }

    .pagination {
        display: flex;
        justify-content: center;
        gap: 5px;
        padding: 25px;
        background: rgba(128, 0, 32, 0.02);
        border-top: 1px solid rgba(128, 0, 32, 0.1);
    }

    .pagination a,
    .pagination span {
        padding: 10px 15px;
        border: 1px solid rgba(128, 0, 32, 0.2);
        border-radius: 8px;
        text-decoration: none;
        color: #2c2c2c;
        transition: all 0.3s ease;
    }

    .pagination a:hover,
    .pagination .active {
        background: linear-gradient(135deg, #800020 0%, #a0002a 100%);
        color: white;
        border-color: #800020;
    }

    /* Alert Messages */
    .alert {
        margin: 20px 0;
        padding: 15px 20px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        gap: 10px;
        font-weight: 500;
    }

    .alert-success {
        background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
        border: 1px solid #c3e6cb;
        color: #155724;
    }

    .alert-error {
        background: linear-gradient(135deg, #f8d7da 0%, #f5c6cb 100%);
        border: 1px solid #f5c6cb;
        color: #721c24;
    }

    .close-btn {
        margin-left: auto;
        background: none;
        border: none;
        font-size: 18px;
        cursor: pointer;
        opacity: 0.7;
    }

    .close-btn:hover {
        opacity: 1;
    }


    .compose-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.2);
            border: none;
            color: black;
            padding: 0.5rem;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            width: 36px;
            height: 36px;
        }

        .compose-btn:hover {
            background: red;
            color: white;
            text-decoration: none;
        }

    .message-filters {
            padding: 1rem;
            border-bottom: 1px solid #eee;
        }

        .filter-tabs {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .filter-tab {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.75rem 1rem;
            background: none;
            border: none;
            text-align: left;
            cursor: pointer;
            border-radius: 8px;
            transition: all 0.3s ease;
            text-decoration: none;
            color: inherit;
        }

        .filter-tab:hover {
            background: #f8f9fa;
            text-decoration: none;
            color: inherit;
        }

        .filter-tab.active,
        .filter-tab:target {
            background: #8B1538;
            color: white;
        }

        .filter-count {
            background: rgba(139, 21, 56, 0.1);
            color: #8B1538;
            padding: 0.25rem 0.5rem;
            border-radius: 12px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .filter-tab.active .filter-count {
            background: rgba(255, 255, 255, 0.2);
            color: white;
        }
    
        /* Messages List */
        .messages-list {
            max-height: calc(100vh - 500px);
            overflow-y: auto;
        }

        .message-item {
            display: block;
            text-decoration: none;
            color: inherit;
            padding: 1rem;
            border-bottom: 1px solid #eee;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
        }

        .message-item:hover {
            background: #f8f9fa;
            text-decoration: none;
            color: inherit;
        }

        .message-item:target {
            background: #8B1538;
            color: white;
        }

        .message-item:target .message-time,
        .message-item:target .message-preview {
            color: rgba(255, 255, 255, 0.8);
        }

        .message-item.active {
            background: #8B1538;
            color: white;
        }

        .message-item.unread {
            background: #fff3f3;
            border-left: 4px solid #8B1538;
        }

        .message-item.unread:target,
        .message-item.unread.active {
            background: #8B1538;
        }

        .message-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 0.5rem;
        }

        .sender-name {
            font-weight: 600;
            font-size: 0.9rem;
        }

        .message-time {
            font-size: 0.8rem;
            opacity: 0.7;
        }

        .message-subject {
            font-size: 0.9rem;
            font-weight: 500;
            margin-bottom: 0.25rem;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .message-preview {
            font-size: 0.8rem;
            opacity: 0.7;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .unread-indicator {
            position: absolute;
            top: 1rem;
            right: 1rem;
            width: 8px;
            height: 8px;
            background: #8B1538;
            border-radius: 50%;
        }

        /* Message Content */
        .message-content {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        .content-header {
            padding: 1.5rem;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .message-info h3 {
            font-size: 1.3rem;
            margin-bottom: 0.5rem;
            color: #333;
        }

        .message-meta {
            display: flex;
            flex-direction: column;
            gap: 0.25rem;
        }

        .meta-item {
            font-size: 0.9rem;
            color: #666;
        }

        .meta-item strong {
            color: #333;
            margin-right: 0.5rem;
        }

        .message-actions {
            display: flex;
            gap: 0.5rem;
        }

        .action-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0.5rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            width: 36px;
            height: 36px;
            text-decoration: none;
            color: white;
        }

        .reply-btn {
            background: #28a745;
            color: white;
        }

        .reply-btn:hover,
        .forward-btn:hover,
        .delete-btn:hover,
        .archive-btn:hover {
            text-decoration: none;
            color: white;
        }

        .reply-btn:hover {
            background: #218838;
            transform: translateY(-2px);
        }

        .forward-btn:hover {
            background: #138496;
            transform: translateY(-2px);
        }

        .delete-btn {
            background: #dc3545;
            color: white;
        }

        .delete-btn:hover {
            background: #c82333;
            transform: translateY(-2px);
        }

        .archive-btn {
            background: #6c757d;
            color: white;
        }

        .archive-btn:hover {
            background: #5a6268;
            transform: translateY(-2px);
        }

        .content-body {
            padding: 2rem;
            flex: 1;
            overflow-y: auto;
            line-height: 1.8;
        }

        .empty-state {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100%;
            color: #666;
            text-align: center;
        }

        .empty-state i {
            font-size: 4rem;
            margin-bottom: 1rem;
            color: #8B1538;
            opacity: 0.5;
        }

        .empty-state h3 {
            margin-bottom: 0.5rem;
            font-size: 1.5rem;
        }

        /* Priority Labels */
        .priority-high {
            color: #dc3545;
            font-weight: 600;
        }

        .priority-medium {
            color: #ffc107;
            font-weight: 600;
        }

        .priority-low {
            color: #28a745;
            font-weight: 600;
        }

        /* Attachments */
        .attachments {
            margin-top: 2rem;
            padding-top: 1rem;
            border-top: 1px solid #eee;
        }

        .attachment-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem;
            background: #f8f9fa;
            border-radius: 8px;
            margin-bottom: 0.5rem;
        }

        .attachment-icon {
            color: #8B1538;
        }

        .attachment-info {
            flex: 1;
        }

        .attachment-name {
            font-size: 0.9rem;
            font-weight: 500;
        }

        .attachment-size {
            font-size: 0.8rem;
            color: #666;
        }

        .download-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            background: none;
            border: none;
            color: #8B1538;
            cursor: pointer;
            padding: 0.25rem;
            border-radius: 4px;
            transition: background-color 0.3s ease;
            text-decoration: none;
            width: 24px;
            height: 24px;
        }

        .download-btn:hover {
            background: rgba(139, 21, 56, 0.1);
            color: #8B1538;
            text-decoration: none;
        }

    /* Responsive Design */
    @media (max-width: 768px) {
        .products-table {
            font-size: 12px;
        }

        .products-table th,
        .products-table td {
            padding: 12px 8px;
        }

        .action-buttons-cell {
            flex-direction: column;
        }
    }
</style>

</head>
<body>
    <div class="main-content">
        <!-- Welcome Header -->
        <div class="welcome-header">
            <div class="welcome-text">
                <h1>Messages</h1>
                <p>Manage your conversations and stay connected</p>
            </div>
            <div class="profile-avatar">
                <i class="fas fa-envelope"></i>
            </div>
        </div>

        <!-- Message Stats -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-info">
                    <div class="stat-label">Total Messages</div>
                    <div class="stat-value">247</div>
                </div>
                <div class="stat-icon">
                    <i class="fas fa-envelope"></i>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-info">
                    <div class="stat-label">Unread Messages</div>
                    <div class="stat-value">23</div>
                </div>
                <div class="stat-icon">
                    <i class="fas fa-envelope-open"></i>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-info">
                    <div class="stat-label">Drafts</div>
                    <div class="stat-value">8</div>
                </div>
                <div class="stat-icon">
                    <i class="fas fa-edit"></i>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-info">
                    <div class="stat-label">Archived</div>
                    <div class="stat-value">156</div>
                </div>
                <div class="stat-icon">
                    <i class="fas fa-archive"></i>
                </div>
            </div>
        </div>

        <!-- Messages Container -->
        <div class="messages-container">
            <!-- Messages Sidebar -->
            <div class="messages-sidebar">
                <div class="sidebar-header">
                    <h3>Messages</h3>
                    <button class="compose-btn" title="Compose New Message">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>

                <div class="message-filters">
                    <div class="filter-tabs">
                        <button class="filter-tab active">
                            <span><i class="fas fa-inbox"></i> Inbox</span>
                            <span class="filter-count">23</span>
                        </button>
                        <button class="filter-tab">
                            <span><i class="fas fa-paper-plane"></i> Sent</span>
                            <span class="filter-count">45</span>
                        </button>
                        <button class="filter-tab">
                            <span><i class="fas fa-edit"></i> Drafts</span>
                            <span class="filter-count">8</span>
                        </button>
                        <button class="filter-tab">
                            <span><i class="fas fa-archive"></i> Archived</span>
                            <span class="filter-count">156</span>
                        </button>
                        <button class="filter-tab">
                            <span><i class="fas fa-star"></i> Important</span>
                            <span class="filter-count">12</span>
                        </button>
                        <button class="filter-tab">
                            <span><i class="fas fa-trash"></i> Trash</span>
                            <span class="filter-count">7</span>
                        </button>
                    </div>
                </div>

                <div class="messages-list">
                    <div class="message-item unread active">
                        <div class="message-header">
                            <span class="sender-name">Sarah Johnson</span>
                            <span class="message-time">2m ago</span>
                        </div>
                        <div class="message-subject">New Order Inquiry - Diamond Earrings</div>
                        <div class="message-preview">Hi, I'm interested in purchasing the diamond earrings...</div>
                        <div class="unread-indicator"></div>
                    </div>

                    <div class="message-item unread">
                        <div class="message-header">
                            <span class="sender-name">Michael Brown</span>
                            <span class="message-time">15m ago</span>
                        </div>
                        <div class="message-subject">Order Status Update Request</div>
                        <div class="message-preview">Could you please provide an update on my recent order...</div>
                        <div class="unread-indicator"></div>
                    </div>

                    <div class="message-item">
                        <div class="message-header">
                            <span class="sender-name">Emma Wilson</span>
                            <span class="message-time">1h ago</span>
                        </div>
                        <div class="message-subject">Thank you for the beautiful products!</div>
                        <div class="message-preview">I just received my order and I'm absolutely thrilled...</div>
                    </div>

                    <div class="message-item">
                        <div class="message-header">
                            <span class="sender-name">David Lee</span>
                            <span class="message-time">2h ago</span>
                        </div>
                        <div class="message-subject">Product Customization Question</div>
                        <div class="message-preview">Is it possible to customize the silver bracelet with...</div>
                    </div>

                    <div class="message-item unread">
                        <div class="message-header">
                            <span class="sender-name">Lisa Garcia</span>
                            <span class="message-time">3h ago</span>
                        </div>
                        <div class="message-subject">Return Request - Makeup Foundation</div>
                        <div class="message-preview">I would like to return the makeup foundation as it doesn't...</div>
                        <div class="unread-indicator"></div>
                    </div>

                    <div class="message-item">
                        <div class="message-header">
                            <span class="sender-name">Alex Thompson</span>
                            <span class="message-time">5h ago</span>
                        </div>
                        <div class="message-subject">Wholesale Partnership Inquiry</div>
                        <div class="message-preview">We're interested in establishing a wholesale partnership...</div>
                    </div>

                    <div class="message-item">
                        <div class="message-header">
                            <span class="sender-name">Sophie Chen</span>
                            <span class="message-time">1d ago</span>
                        </div>
                        <div class="message-subject">Product Recommendation Request</div>
                        <div class="message-preview">Could you recommend some products suitable for sensitive...</div>
                    </div>

                    <div class="message-item">
                        <div class="message-header">
                            <span class="sender-name">James Wilson</span>
                            <span class="message-time">1d ago</span>
                        </div>
                        <div class="message-subject">Shipping Information</div>
                        <div class="message-preview">Please confirm the shipping address for my recent order...</div>
                    </div>
                </div>
            </div>

            <!-- Message Content -->
            <div class="message-content">
                <div class="content-header">
                    <div class="message-info">
                        <h3>New Order Inquiry - Diamond Earrings</h3>
                        <div class="message-meta">
                            <div class="meta-item"><strong>From:</strong> Sarah Johnson &lt;sarah.j@email.com&gt;</div>
                            <div class="meta-item"><strong>To:</strong> support@jewelrystore.com</div>
                            <div class="meta-item"><strong>Date:</strong> August 21, 2025 at 2:45 PM</div>
                            <div class="meta-item"><strong>Priority:</strong> <span class="priority-high">High</span></div>
                        </div>
                    </div>
                    <div class="message-actions">
                        <button class="action-btn reply-btn" title="Reply">
                            <i class="fas fa-reply"></i>
                        </button>
                        <button class="action-btn forward-btn" title="Forward">
                            <i class="fas fa-share"></i>
                        </button>
                        <button class="action-btn archive-btn" title="Archive">
                            <i class="fas fa-archive"></i>
                        </button>
                        <button class="action-btn delete-btn" title="Delete">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>

                <div class="content-body">
                    <p>Dear Team,</p>
                    
                    <p>I hope this message finds you well. I'm writing to inquire about the beautiful diamond earrings I saw on your website. I'm particularly interested in the 1-carat diamond stud earrings in white gold setting.</p>
                    
                    <p>I have a few specific questions:</p>
                    <ul>
                        <li>Are these earrings available in different carat sizes?</li>
                        <li>Do you offer certification for the diamonds?</li>
                        <li>What is the current availability and lead time?</li>
                        <li>Are there any current promotions or discounts available?</li>
                    </ul>
                    
                    <p>I'm looking to make this purchase as a gift for my anniversary next month, so timing is quite important to me. I would also appreciate any recommendations you might have for similar pieces if these particular earrings are not available.</p>
                    
                    <p>Additionally, I would like to know about your return and exchange policy, as well as warranty information for jewelry purchases.</p>
                    
                    <p>Thank you for your time and assistance. I look forward to hearing from you soon.</p>
                    
                    <p>Best regards,<br>
                    Sarah Johnson<br>
                    Phone: (555) 123-4567<br>
                    Email: sarah.j@email.com</p>

                    <div class="attachments">
                        <h4>Attachments (2)</h4>
                        <div class="attachment-item">
                            <i class="fas fa-file-image attachment-icon"></i>
                            <div class="attachment-info">
                                <div class="attachment-name">inspiration-earrings.jpg</div>
                                <div class="attachment-size">245 KB</div>
                            </div>
                            <button class="download-btn" title="Download">
                                <i class="fas fa-download"></i>
                            </button>
                        </div>
                        <div class="attachment-item">
                            <i class="fas fa-file-pdf attachment-icon"></i>
                            <div class="attachment-info">
                                <div class="attachment-name">budget-details.pdf</div>
                                <div class="attachment-size">89 KB</div>
                            </div>
                            <button class="download-btn" title="Download">
                                <i class="fas fa-download"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include ('../includes/footer.php');
?>

    
</body>
</html>