package com.esprit.microservice;


import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.query.Param;

public interface CategorieRepository extends JpaRepository<Categorie, Integer> {

	@Query("select c from Categorie c where c.name like :name")
	public Page<Categorie> CategorieByName(@Param("name") String n, Pageable pageable);
}
