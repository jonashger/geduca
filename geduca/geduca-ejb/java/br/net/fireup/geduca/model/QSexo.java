package br.net.fireup.geduca.model;

import static com.mysema.query.types.PathMetadataFactory.*;

import com.mysema.query.types.path.*;

import com.mysema.query.types.PathMetadata;
import javax.annotation.Generated;
import com.mysema.query.types.Path;


/**
 * QSexo is a Querydsl query type for Sexo
 */
@Generated("com.mysema.query.codegen.EntitySerializer")
public class QSexo extends EntityPathBase<Sexo> {

    private static final long serialVersionUID = 1923575105L;

    public static final QSexo sexo = new QSexo("sexo");

    public final NumberPath<Long> codigoPessoa = createNumber("codigoPessoa", Long.class);

    public final NumberPath<Long> codigoTipoSexo = createNumber("codigoTipoSexo", Long.class);

    public final NumberPath<Long> id = createNumber("id", Long.class);

    public QSexo(String variable) {
        super(Sexo.class, forVariable(variable));
    }

    public QSexo(Path<? extends Sexo> path) {
        super(path.getType(), path.getMetadata());
    }

    public QSexo(PathMetadata<?> metadata) {
        super(Sexo.class, metadata);
    }

}

