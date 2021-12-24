package com.esprit.microservice;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

@Service
public class CategorieService {

	@Autowired
	private CategorieRepository categorieRepository;
	
	public Categorie addCategorie(Categorie categorie) {
		return categorieRepository.save(categorie);
	}
	
	public Categorie updateCategorie(int id, Categorie newcategorie){
		if (categorieRepository.findById(id).isPresent()){
			Categorie existingCategorie = categorieRepository.findById(id).get();
			existingCategorie.setName(newcategorie.getName());
			existingCategorie.setDescription(newcategorie.getDescription());
		
		
			return categorieRepository.save(existingCategorie);
		} else 
			return null;
	}
	
	public String deleteCategorie(int id) {
		if(categorieRepository.findById(id).isPresent()) {
			categorieRepository.deleteById(id);
			return "catégorie supprimé";	
			
		} else
			return "catégorie non supprimé";
	}
	
	
	
	
	
	
	
	
}
