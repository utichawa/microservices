package com.esprit.microservice;


import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.MediaType;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.DeleteMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.PutMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.ResponseStatus;
import org.springframework.web.bind.annotation.RestController;

@RestController
@RequestMapping(value = "/api/categories")
public class CategorieRestAPI {
	
	

	@Autowired
	private CategorieService categorieService;
	
	
	
	@PostMapping
	@ResponseStatus(HttpStatus.CREATED)
	public ResponseEntity<Categorie> createCategorie (@RequestBody Categorie categorie) {
		
		
		return  new ResponseEntity<>(categorieService.addCategorie(categorie), HttpStatus.OK);
		
		
	}
	
	@PutMapping(value = "/{id}", produces = MediaType.APPLICATION_JSON_VALUE)
	@ResponseStatus(HttpStatus.OK)
	public ResponseEntity<Categorie> updateCategorie (@PathVariable(value = "id") int id , @RequestBody Categorie categorie) {
		
		
		return  new ResponseEntity<>(categorieService.updateCategorie(id, categorie), HttpStatus.OK);
		
		
	}
	
	@DeleteMapping(value = "/{id}", produces = MediaType.APPLICATION_JSON_VALUE)
	@ResponseStatus(HttpStatus.OK)
	public ResponseEntity<String> deleteCategorie (@PathVariable(value = "id") int id) {
		
		
		return  new ResponseEntity<>(categorieService.deleteCategorie(id), HttpStatus.OK);
		
		
	}

}
