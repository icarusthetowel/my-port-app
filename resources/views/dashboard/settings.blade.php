@extends('layouts.app')

@section('title', 'Settings')

@section('content')
<div class="page-header">
    <h1>Settings & Configuration</h1>
    <p>Manage your application settings</p>
</div>

<div style="display: grid; grid-template-columns: 1fr 3fr; gap: 20px;">
    <!-- Settings Menu -->
    <div class="card" style="height: fit-content;">
        <ul style="list-style: none;">
            <li><a href="#" style="display: block; padding: 12px; border-radius: 6px; background: #e3f2fd; color: #0066ff; text-decoration: none; font-weight: 600; margin-bottom: 8px;">General</a></li>
            <li><a href="#" style="display: block; padding: 12px; border-radius: 6px; color: #666; text-decoration: none; margin-bottom: 8px; hover: background #f0f2f5;">Profile</a></li>
            <li><a href="#" style="display: block; padding: 12px; border-radius: 6px; color: #666; text-decoration: none; margin-bottom: 8px;">Security</a></li>
            <li><a href="#" style="display: block; padding: 12px; border-radius: 6px; color: #666; text-decoration: none; margin-bottom: 8px;">Notifications</a></li>
            <li><a href="#" style="display: block; padding: 12px; border-radius: 6px; color: #666; text-decoration: none; margin-bottom: 8px;">Billing</a></li>
            <li><a href="#" style="display: block; padding: 12px; border-radius: 6px; color: #666; text-decoration: none;">Integrations</a></li>
        </ul>
    </div>

    <!-- Settings Content -->
    <div>
        <!-- General Settings -->
        <div class="card">
            <div class="card-header">
                <h2>General Settings</h2>
            </div>
            <form>
                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-weight: 600; margin-bottom: 8px;">Platform Name</label>
                    <input type="text" value="EduAdmin" style="width: 100%; padding: 10px; border: 1px solid #e5e7eb; border-radius: 6px; font-size: 14px;">
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-weight: 600; margin-bottom: 8px;">Platform URL</label>
                    <input type="url" value="https://eduadmin.example.com" style="width: 100%; padding: 10px; border: 1px solid #e5e7eb; border-radius: 6px; font-size: 14px;">
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-weight: 600; margin-bottom: 8px;">Support Email</label>
                    <input type="email" value="support@eduadmin.com" style="width: 100%; padding: 10px; border: 1px solid #e5e7eb; border-radius: 6px; font-size: 14px;">
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-weight: 600; margin-bottom: 8px; margin-top: 20px;">Timezone</label>
                    <select style="width: 100%; padding: 10px; border: 1px solid #e5e7eb; border-radius: 6px; font-size: 14px;">
                        <option>UTC</option>
                        <option>EST</option>
                        <option>CST</option>
                        <option>PST</option>
                    </select>
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display: flex; align-items: center; gap: 10px;">
                        <input type="checkbox" checked style="width: 18px; height: 18px;">
                        <span>Enable maintenance mode</span>
                    </label>
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display: flex; align-items: center; gap: 10px;">
                        <input type="checkbox" checked style="width: 18px; height: 18px;">
                        <span>Enable student registration</span>
                    </label>
                </div>

                <button type="submit" style="background: #0066ff; color: white; border: none; padding: 10px 24px; border-radius: 6px; cursor: pointer; font-weight: 600; font-size: 14px;">Save Changes</button>
            </form>
        </div>

        <!-- Email Configuration -->
        <div class="card" style="margin-top: 20px;">
            <div class="card-header">
                <h2>Email Configuration</h2>
            </div>
            <form>
                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-weight: 600; margin-bottom: 8px;">SMTP Host</label>
                    <input type="text" value="smtp.gmail.com" style="width: 100%; padding: 10px; border: 1px solid #e5e7eb; border-radius: 6px; font-size: 14px;">
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 20px;">
                    <div>
                        <label style="display: block; font-weight: 600; margin-bottom: 8px;">SMTP Port</label>
                        <input type="number" value="587" style="width: 100%; padding: 10px; border: 1px solid #e5e7eb; border-radius: 6px; font-size: 14px;">
                    </div>
                    <div>
                        <label style="display: block; font-weight: 600; margin-bottom: 8px;">SMTP Encryption</label>
                        <select style="width: 100%; padding: 10px; border: 1px solid #e5e7eb; border-radius: 6px; font-size: 14px;">
                            <option>TLS</option>
                            <option>SSL</option>
                        </select>
                    </div>
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-weight: 600; margin-bottom: 8px;">SMTP Username</label>
                    <input type="email" placeholder="your-email@gmail.com" style="width: 100%; padding: 10px; border: 1px solid #e5e7eb; border-radius: 6px; font-size: 14px;">
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-weight: 600; margin-bottom: 8px;">SMTP Password</label>
                    <input type="password" style="width: 100%; padding: 10px; border: 1px solid #e5e7eb; border-radius: 6px; font-size: 14px;">
                </div>

                <button type="submit" style="background: #0066ff; color: white; border: none; padding: 10px 24px; border-radius: 6px; cursor: pointer; font-weight: 600; font-size: 14px;">Test Connection</button>
            </form>
        </div>

        <!-- Account & Logout -->
        <div class="card" style="margin-top: 20px; border-top: 2px solid #fee; padding-top: 20px;">
            <div class="card-header">
                <h2>Account Management</h2>
            </div>
            <div style="margin-bottom: 20px;">
                <p style="color: #666; margin-bottom: 15px;">Logged in as: <strong>{{ auth()->user()->email }}</strong></p>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" style="background: #f44336; color: white; border: none; padding: 10px 24px; border-radius: 6px; cursor: pointer; font-weight: 600; font-size: 14px; transition: background 0.2s;" onmouseover="this.style.background='#d32f2f'" onmouseout="this.style.background='#f44336'">Logout</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
