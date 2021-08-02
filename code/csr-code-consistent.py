# BEFORE
if (whale.isSinging) {
    activateAudioRecordingDevice();
} else {
    recording_device_off_confirmation_check();
}

if (starfish.blockingCamera)
{
    AirCannon.Spray(camera.coordinates);
}

# AFTER
if (Whale.isSinging) {
    activateAudioRecordingDevice();
} else {
    confirmRecordingDeviceOff();
}

if (Starfish.isBlockingCamera) {
    AirCannon.spray(Camera.coordinates);
}