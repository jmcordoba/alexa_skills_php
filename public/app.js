const endPoints = [
    "wss://webrtc.demo.ivrpowers.com:8989",
    "https://webrtc.demo.ivrpowers.com:8089/webrtc-gateway"
];

const iceServers = [
    { urls: "stun:turn.eu.ivrpowers.com:443" },
    { urls: "turn:turn.eu.ivrpowers.com:443", username: "centribal", credential: "A2a4v1jBj2GpNh2" },
    { urls: "turn:turn.eu.ivrpowers.com:443?transport=tcp", username: "centribal", credential: "A2a4v1jBj2GpNh2" }
];

const debugLevel = ["error"];
const apiSecret = "not-required-demo-acc";
const acc = "centribot-poc";
const callerPrefix = "CENTRIBOTPOC";

(function() {

    document.getElementById('call').addEventListener('click', (e) => {
        e.preventDefault();

        const myVideoApp = new VideoRTC(endPoints, iceServers, debugLevel, apiSecret);
        myVideoApp.connect()
        .then(usecases => {

            const onEvents = {};

            const domElements = {
                local: document.getElementById('localvideo'),
                remote: document.getElementById('remotevideo'),
                screenRemote: document.getElementById('remotescreen'),
                screenLocal: document.getElementById('localscreen')
            };

            const options = {
                stream: {
                    audioEnabled: true,
                    videoEnabled: true,
                    aDeviceId: null,
                    vDeviceId: null,
                    resolution: 'vga',
                },
                account: acc,
            };

            usecases.splitClient(onEvents, domElements, options)
                .then(action => {
                    action.call(callerPrefix);
                })
                .catch(cause => {
                    console.log("Error Attach " + cause );
                })

        })
        .catch(cause => {
            console.log(cause || "Error connecting with the VideoRTC");
        })

    })

})();
