import controllers.LightController;
import controllers.SecurityController;
import controllers.ThermostatController;
import devices.IDevice;
import devices.LightDevice;
import devices.SecurityDevice;
import devices.ThermostatDevice;
import java.util.ArrayList;
import java.util.List;
import services.SmartHomeApp;

public class Main {
    public static void main(String[] args) {

        // Contrôleurs
        LightController lightController = new LightController();
        ThermostatController thermostatController = new ThermostatController();
        SecurityController securityController = new SecurityController();

        // Équipements
        List<IDevice> devices = new ArrayList<>();
        devices.add(new LightDevice());
        devices.add(new ThermostatDevice());
        devices.add(new SecurityDevice());

        // Application
        SmartHomeApp smartHomeApp = new SmartHomeApp(
                lightController,
                thermostatController,
                securityController,
                devices
        );

        // Tests
        smartHomeApp.turnOnLight("Salon");
        smartHomeApp.setTemperature(22.5f);
        smartHomeApp.lockDoors();

        System.out.println();

        smartHomeApp.turnOffAll();
    }
}