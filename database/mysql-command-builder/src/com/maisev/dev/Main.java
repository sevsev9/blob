package com.maisev.dev;

import java.io.*;
import java.util.ArrayList;

public class Main {

    public static void main(String[] args) {
        File CSV = new File("../items.csv");
        File names = new File("../names.txt");
        File out = new File("../commands.txt");
        ArrayList<String> itemnames = new ArrayList<>();
        ArrayList<String> buf = new ArrayList<>();
        String line;


        try (
                BufferedReader bf = new BufferedReader(new FileReader(CSV));
                BufferedWriter b2 = new BufferedWriter(new FileWriter(names));
                BufferedWriter b3 = new BufferedWriter(new FileWriter(out))
        ){
            while ((line=bf.readLine()) != null) {
                itemnames.add(parseLine(line));
            }
            for (String name: itemnames ) {
                buf.add(name.substring(1,name.length()-1).replace(" ","_").replace("-","_"));
            }
            itemnames = buf;
            for (String name: itemnames) {
                b2.write(name + "\n");
                b3.write("ALTER TABLE users ADD item_" + name + " tinyint(1);\n");
            }

        } catch (IOException e) {
            e.printStackTrace();
        }
    }

    public static String parseLine(String line) {
        String[] values = line.split(",");
        return values[1];
    }
}
