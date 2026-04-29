<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Berita | Sistem Ahli Waris</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        /* Reusing styles from index.blade.php */
        :root {
            --primary-color: #4361ee;
            --primary-light: #eef2ff;
            --secondary-color: #3f37c9;
            --accent-color: #4cc9f0;
            --success-color: #06d6a0;
            --warning-color: #ffd166;
            --danger-color: #ef476f;
            --dark-color: #1a1a2e;
            --light-color: #f8f9ff;
            --gray-color: #8b8c9c;
            --sidebar-width: 280px;
            --header-height: 80px;
            --border-radius: 16px;
            --shadow-light: 0 4px 20px rgba(0, 0, 0, 0.05);
            --shadow-medium: 0 8px 30px rgba(0, 0, 0, 0.08);
            --shadow-strong: 0 15px 50px rgba(67, 97, 238, 0.15);
            --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        }
        
        * { margin: 0; padding: 0; box-sizing: border-box; }
        
        body {
            background-color: var(--light-color);
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            overflow-x: hidden;
            min-height: 100vh;
            display: flex;
        }
        
        .sidebar {
            width: 280px;
            background: linear-gradient(180deg, var(--dark-color) 0%, #16213e 100%);
            color: #fff;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            z-index: 1000;
            padding: 24px 20px;
            display: flex;
            flex-direction: column;
            box-shadow: var(--shadow-medium);
            transition: var(--transition);
            overflow-y: auto;
        }
        
        .sidebar-header {
            padding-bottom: 24px;
            margin-bottom: 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .brand {
            font-weight: 800;
            font-size: 28px;
            letter-spacing: 1px;
            background: linear-gradient(90deg, var(--accent-color), #fff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .brand i {
            background: var(--primary-color);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-size: 28px;
        }
        
        .nav-link {
            color: rgba(255, 255, 255, 0.75);
            text-decoration: none;
            border-radius: 12px;
            padding: 14px 16px;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 500;
            font-size: 15px;
            transition: var(--transition);
            position: relative;
        }
        
        .nav-link:hover {
            color: #fff;
            background: rgba(255, 255, 255, 0.08);
            transform: translateX(8px);
        }
        
        .nav-link.active {
            color: #fff;
            background: var(--primary-color);
            box-shadow: 0 4px 12px rgba(67, 97, 238, 0.3);
        }
        
        .nav-icon { font-size: 20px; width: 24px; text-align: center; }
        
        .sidebar-footer {
            margin-top: auto;
            padding-top: 24px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: rgba(255, 255, 255, 0.5);
            font-size: 14px;
        }
        
        .content {
            flex: 1;
            margin-left: 280px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            width: calc(100vw - 280px);
        }
        
        .main-header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            padding: 16px 32px;
            height: var(--header-height);
            position: sticky;
            top: 0;
            z-index: 999;
            box-shadow: var(--shadow-light);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        
        .header-title { font-weight: 700; color: var(--dark-color); font-size: 24px; letter-spacing: -0.2px; }
        .header-actions { display: flex; align-items: center; gap: 24px; }

        .notify-btn {
            position: relative;
            width: 42px; height: 42px; border-radius: 12px;
            background: white; border: 1px solid rgba(0,0,0,0.05);
            color: var(--gray-color); display: flex; align-items: center; justify-content: center;
            font-size: 20px; transition: var(--transition); text-decoration: none;
            box-shadow: var(--shadow-light);
        }
        .notify-btn:hover { background: var(--primary-light); color: var(--primary-color); transform: translateY(-2px); }
        .notify-btn.active { color: var(--primary-color); background: white; border-color: var(--primary-color); }
        .notify-badge {
            position: absolute; top: -5px; right: -5px;
            background: #ff3b55; color: white;
            font-size: 10px; font-weight: 700;
            padding: 4px 6px; border-radius: 6px;
            box-shadow: 0 4px 10px rgba(255, 59, 85, 0.3);
            border: 2px solid white;
        }
        
        .user-profile {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 8px 12px;
            background: white;
            border: 1px solid rgba(0, 0, 0, 0.05);
            border-radius: 12px;
            cursor: pointer;
            transition: var(--transition);
        }

        .user-profile:hover {
            background: var(--light-color);
        }

        .user-info {
            flex: 1;
        }

        .user-name {
            font-weight: 600;
            font-size: 14px;
            color: var(--dark-color);
        }

        .user-role {
            font-size: 12px;
            color: var(--gray-color);
        }
        
        .user-avatar {
            width: 36px; height: 36px; border-radius: 50%;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            display: flex; align-items: center; justify-content: center;
            color: white; font-weight: 600; font-size: 14px;
        }

        .user-avatar-img {
            width: 36px; height: 36px; border-radius: 50%;
            object-fit: cover; border: 2px solid white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .logout-btn {
            background: linear-gradient(135deg, #ff3b55, #d90429);
            border: none; padding: 12px 20px; border-radius: 14px;
            color: #fff; font-weight: 700; font-size: 14px;
            display: inline-flex; align-items: center; gap: 8px;
            transition: var(--transition); cursor: pointer; min-width: 120px;
            justify-content: center; box-shadow: 0 10px 24px rgba(239, 71, 111, 0.25);
        }
        .logout-btn:hover { transform: translateY(-2px) scale(1.02); box-shadow: 0 14px 32px rgba(239, 71, 111, 0.35); }
        
        .main-content { padding: 32px; flex: 1; overflow-y: auto; max-width: 100%; }
        
        .card {
            background: white; border-radius: var(--border-radius);
            box-shadow: var(--shadow-light); border: 1px solid rgba(0,0,0,0.03);
            overflow: hidden;
            margin-bottom: 24px;
        }
        
        .card-header {
            padding: 24px; background: white; border-bottom: 1px solid rgba(0,0,0,0.05);
            display: flex; justify-content: space-between; align-items: center;
        }
        
        .card-body { padding: 24px; }

        .form-label { font-weight: 600; color: var(--dark-color); margin-bottom: 8px; }
        .form-control, .form-select {
            padding: 12px; border-radius: 10px; border: 1px solid rgba(0,0,0,0.1);
            transition: var(--transition);
        }
        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(67, 97, 238, 0.1);
        }
        
        .ck-editor__editable { min-height: 300px; }

        /* Hide Mobile Toggle */
        .menu-toggle {
            display: none;
        }

        @media (max-width: 991px) {
            .sidebar {
                transform: translateX(-100%);
                width: 100%;
                max-width: 280px;
                z-index: 1050;
            }
            
            .sidebar.active {
                transform: translateX(0);
            }
            
            .sidebar-overlay {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: rgba(0, 0, 0, 0.5);
                z-index: 1040;
                opacity: 0;
                visibility: hidden;
                transition: all 0.3s;
                backdrop-filter: blur(4px);
            }
            
            .sidebar-overlay.active {
                opacity: 1;
                visibility: visible;
            }
            
            .content {
                margin-left: 0;
                width: 100%;
            }
            
            .main-header {
                padding: 16px;
                justify-content: space-between;
            }
            
            .main-header > .d-flex {
                flex: 1;
                gap: 12px !important;
                min-width: 0;
            }
            
            .menu-toggle {
                display: block;
                background: none;
                border: none;
                font-size: 24px;
                color: var(--dark-color);
                cursor: pointer;
                padding: 0;
                margin-right: 12px;
            }
            
            .header-title {
                font-size: 18px;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }
            
            .header-actions {
                gap: 8px;
                flex-shrink: 0;
            }

            .notify-btn {
                padding: 0;
                width: 40px;
                height: 40px;
                justify-content: center;
                border-radius: 10px;
            }
            
            .user-info {
                display: none;
            }
            
            .user-profile {
                min-width: auto;
                padding: 8px;
            }
        }
    </style>
</head>
<body>
    <div class="sidebar-overlay" onclick="toggleSidebar()"></div>
    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-header">
            <div class="brand">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height: 45px; width: auto; object-fit: contain;">
                <span>WARIS</span>
            </div>
            <div class="mt-2 text-muted" style="font-size: 13px; opacity: 0.7;">
                Sistem Manajemen Ahli Waris
            </div>
        </div>
        
        <nav class="flex-grow-1">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <i class="bi bi-speedometer2 nav-icon"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ Route::has('permohonan.index') ? route('permohonan.index') : '#' }}" class="nav-link">
                        <i class="bi bi-folder2-open nav-icon"></i>
                        <span>Permohonan Waris</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('ahli-waris.index') }}" class="nav-link">
                        <i class="bi bi-people nav-icon"></i>
                        <span>Data Ahli Waris</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('berita.index') }}" class="nav-link active">
                        <i class="bi bi-newspaper nav-icon"></i>
                        <span>Berita</span>
                    </a>
                </li>
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="nav-link w-100 text-start border-0" style="cursor: pointer; background: linear-gradient(135deg, #ff3b55, #d90429); color: white;">
                            <i class="bi bi-box-arrow-right nav-icon" style="color: white;"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                </li>
            </ul>
        </nav>
        
        <div class="sidebar-footer">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="fw-medium" style="font-size: 14px;">Sistem Ahli Waris</div>
                    <small>Versi 1.0 • {{ date('Y') }}</small>
                </div>
                <div class="text-end">
                    <div class="badge bg-success bg-opacity-25 text-success px-3 py-1 rounded-pill">
                        <i class="bi bi-check-circle-fill me-1"></i>
                        Aktif
                    </div>
                </div>
            </div>
        </div>
    </aside>

    <!-- Main Content Area -->
    <div class="content">
        <!-- Fixed Header -->
        <header class="main-header">
            <button class="menu-toggle" onclick="toggleSidebar()">
                <i class="bi bi-list"></i>
            </button>
            <div class="d-flex align-items-center gap-4">
                <h1 class="header-title mb-0">Edit Data Berita</h1>
            </div>
            
            <div class="header-actions">
                <a href="{{ route('permohonan.notify') }}" class="notify-btn {{ (isset($pendingCount) && $pendingCount > 0) ? 'active' : '' }}" title="Permohonan belum diproses">
                    <i class="bi bi-bell"></i>
                    @if(isset($pendingCount) && $pendingCount > 0)
                        <span class="notify-badge">{{ $pendingCount }}</span>
                    @endif
                </a>
                <div class="user-profile" data-bs-toggle="modal" data-bs-target="#profileModal" style="cursor: pointer;">
                    @if(Auth::user() && Auth::user()->avatar)
                        <img src="{{ asset(Auth::user()->avatar) }}" alt="Avatar" class="user-avatar-img">
                    @else
                        <div class="user-avatar">{{ substr(Auth::user()->name ?? 'AD', 0, 2) }}</div>
                    @endif
                    <div>
                        <div class="fw-medium">{{ Auth::user()->name ?? 'Administrator' }}</div>
                        <small class="text-muted">Admin Sistem</small>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="main-content">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Edit Berita</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="penulis" class="form-label">Penulis</label>
                                <input type="text" class="form-control @error('penulis') is-invalid @enderror" id="penulis" name="penulis" value="{{ old('penulis', $berita->penulis) }}" required>
                                @error('penulis')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="editor" class="form-label">Editor</label>
                                <input type="text" class="form-control @error('editor') is-invalid @enderror" id="editor" name="editor" value="{{ old('editor', $berita->editor) }}">
                                @error('editor')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul Berita</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul', $berita->judul) }}" required>
                            @error('judul')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi Singkat</label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="3">{{ old('deskripsi', $berita->deskripsi) }}</textarea>
                            @error('deskripsi')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label for="isi_konten" class="form-label">Isi Konten</label>
                            <textarea class="form-control @error('isi_konten') is-invalid @enderror" id="isi_konten" name="isi_konten">{{ old('isi_konten', $berita->isi_konten) }}</textarea>
                            @error('isi_konten')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="kategori" class="form-label">Kategori</label>
                                <input type="text" class="form-control @error('kategori') is-invalid @enderror" id="kategori" name="kategori" value="{{ old('kategori', $berita->kategori) }}" required>
                                @error('kategori')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                                    <option value="draft" {{ old('status', $berita->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                                    <option value="publish" {{ old('status', $berita->status) == 'publish' ? 'selected' : '' }}>Publish</option>
                                </select>
                                @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label for="thumbnail" class="form-label">Thumbnail</label>
                                <input type="file" class="form-control @error('thumbnail') is-invalid @enderror" id="thumbnail" name="thumbnail" accept="image/*">
                                <div class="form-text">Biarkan kosong jika tidak ingin mengubah thumbnail.</div>
                                @error('thumbnail')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6">
                                @if($berita->thumbnail)
                                    <label class="form-label">Thumbnail Saat Ini</label>
                                    <div>
                                        <img src="{{ asset('storage/' . $berita->thumbnail) }}" alt="Current Thumbnail" style="max-height: 150px; border-radius: 8px;">
                                    </div>
                                @endif
                            </div>
                        </div>
                        
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label class="form-label">Tanggal Dibuat</label>
                                <input type="text" class="form-control" value="{{ $berita->created_at->format('d M Y, H:i') }}" readonly disabled style="background-color: #f8f9fa;">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Tanggal Publish</label>
                                <input type="text" class="form-control" value="{{ $berita->published_at ? $berita->published_at->format('d M Y, H:i') : '-' }}" readonly disabled style="background-color: #f8f9fa;">
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('berita.index') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#isi_konten'))
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        function toggleSidebar() {
            document.querySelector('.sidebar').classList.toggle('active');
            document.querySelector('.sidebar-overlay').classList.toggle('active');
        }
    </script>

    <!-- Profile Modal -->
    <div class="modal fade" id="profileModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ubah Foto Profil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="avatar" class="form-label">Pilih Foto</label>
                            <input type="file" class="form-control" id="avatar" name="avatar" accept="image/*" required>
                            <div class="form-text">Format: JPG, PNG, JPEG. Maks: 2MB.</div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
