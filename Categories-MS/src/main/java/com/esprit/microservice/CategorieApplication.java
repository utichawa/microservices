package com.esprit.microservice;







import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;

import org.springframework.cloud.netflix.eureka.EnableEurekaClient;


//@EnableDiscoveryClient

@SpringBootApplication
@EnableEurekaClient
public class CategorieApplication {

	public static void main(String[] args) {
		SpringApplication.run(CategorieApplication.class, args);
	}
	
	/*
	@Bean
	ApplicationRunner init(CandidatRepository repository) {
		return args -> {
			Stream.of("Mariem","Sarra","Mohamed").forEach(nom -> {
				repository.save(new Candidat(nom));
			});
			repository.findAll().forEach(System.out::println);
		};
	}
*/
}
