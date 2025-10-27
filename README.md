# Canopy-TenantTurner
Canopy - Tenant Turner Integration

## Manual Listings Sync

Triggering the **Sync Listings** button in the WordPress listings admin view sends an AJAX request to the `manual_sync_action` handler. The handler is implemented in `Inc\Controllers\SettingsController::manualSyncAction`, where the listings import is executed and a JSON success response (`{"success": true, "data": "Sync complete!"}`) is returned to the browser for status updates.
