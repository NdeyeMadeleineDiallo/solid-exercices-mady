package devices;

public class SecurityDevice implements IDevice {

    @Override
    public void turnOff() {
        System.out.println("Alarme ACTIVEE.");
    }
}